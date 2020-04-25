<?php
//Vladghukas05#
namespace App\Http\Controllers\Api;

use App\Arendator;
use App\ArendatorViolation;
use App\Http\Requests\ArendatorRequest;
use App\Services\FileUploaderService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;
use Lcobucci\JWT\Parser;
use App\Http\Resources\Arendator as ArendatorResource;
use App\Http\Resources\ArendatorViolationCollection;

class ArendatorController extends Controller
{
    /**
     * @queryParam type required  passport or inn
     * @queryParam passport_serial optional  if type equal passport required
     * @queryParam passport_number optional  if type equal passport required
     * @queryParam inn optional  if type equal inn required
     * @response {
     *  "data": {
     * "id": 205,
     * "first_name": "api",
     * "last_name": "api",
     * "patronymic": "api",
     * "passport_serial": "api",
     * "passport_number": "123",
     * "phone": "api",
     * "region": "api",
     * "city": "api",
     * "date": "2020-04-22",
     * "violetions": [
     * {
     * "id": 483,
     * "status": 1,
     * "date": "2020-04-03",
     * "description": "asdasdasd",
     * "user": {
     * "id": 63,
     * "email": "individual-entrepreneur@gmail.com",
     * "country": "Armenia",
     * "city": "Yerevan",
     * "address": "Kievyan 8",
     * "phone": "123123",
     * "type": 4,
     * "inn": "123",
     * "company_name": "Map",
     * "contact_person_full_name": "Aram Arami Aramyan",
     * "contact_person_position": "Boss"
     * }
     * },
     * {
     * "id": 482,
     * "status": 1,
     * "date": "2020-04-15",
     * "description": "asd",
     * "user": {
     * "id": 95,
     * "email": "client_id_25_time_1587566017@api.com",
     * "country": null,
     * "city": "api",
     * "address": "api",
     * "phone": "api",
     * "type": 5,
     * "full_name": "api"
     * }
     * }
     * ],
     * "user": {
     * "id": 95,
     * "email": "client_id_25_time_1587566017@api.com",
     * "country": null,
     * "city": "api",
     * "address": "api",
     * "phone": "api",
     * "type": 5,
     * "full_name": "api"
     * },
     * "register": "api",
     * "birth_date": "2020-04-15"
     * }
     * }
     */

    public function get(Request $request)
    {
        $type = $request->get('type');

        if (!in_array($type, ['passport', 'inn'])) {
            return response()->json(['msg' => 'Invalid type'], 411);
        }

        if ($type === 'passport') {
            $arendator = Arendator::ofPassport($request->get('passport_serial'), $request->get('passport_number'))->where('type', 1)->first();

        } else {
            $arendator = Arendator::where('inn', $request->get('inn'))->first();
        }

        if ($arendator) {
            return new ArendatorResource($arendator);
        }
        return response()->json([]);
    }


    public function index(Request $request)
    {

        $key = $request->get('key');

        if ($key) {

            $arendators = Arendator::where('search', 'LIKE', '%' . $key . '%')->with('violations')->get();

            if ($arendators) {
                $resp['total'] = count($arendators);
                $resp['items'] = [];

                foreach ($arendators as $arendator) {
                    array_push($resp['items'], $arendator->data);
                }

                return response()->json($resp);
            }
        }

        return response()->json([]);
    }

    /**
     * @queryParam user.contact_phone required
     * @queryParam user.company_name required
     * @queryParam user.address required
     * @queryParam user.city equired
     * @queryParam arendator.type required 1 or 2
     * @queryParam arendator.first_name required
     * @queryParam arendator.last_name required
     * @queryParam arendator.patronymic required
     * @queryParam arendator.contact_phone required
     * @queryParam arendator.city required
     * @queryParam arendator.region required
     * @queryParam arendator.passport_number required
     * @queryParam arendator.passport_serial required
     * @queryParam violations.description required
     * @queryParam violations.status required 0 or 1
     * @queryParam violations.date required date like 2020-04-15
     * @queryParam violations.document optional base_64 string
     * @response {
     *  "msg": "Success"
     * }
     */


    public function store(Request $request)
    {

        $client = $this->client();
        $rules = ArendatorRequest::apiRules();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $userData = $request->get('user');
        $userData['client_id'] = $client->id;
        $userData['type'] = 5;

        try {
            if ($user = User::updateOrCreate(['email' => $userData['email']], $userData)) {

                $arendatorData = $request->get('arendator');
                $arendatorData = Arr::except($arendatorData, ['violations']);
                $arendatorData['user_id'] = $user->id;
                $arendatorData['search'] = implode(" ", Arr::except($arendatorData, ['user_id', 'type', 'birth_date']));
                $violationsData = $request->get('violations');

                $arendator = Arendator::exist($arendatorData)->first();

                if (!$arendator) {
                    $arendator = Arendator::create($arendatorData);
                }

                $violationsData['user_id'] = $user->id;
                $violationsData['arendator_id'] = $arendator->id;

                if (key_exists('document', $violationsData) && $violationsData['document'] !== null) {
                    $data['document'] = FileUploaderService::arendatorViolationFile($violationsData['document']);
                }
                ArendatorViolation::create($violationsData);
            }

            return response()->json(['msg' => 'Добавлено']);

        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 411);
        }
    }


    public function client()
    {
        $bearerToken = request()->bearerToken();
        $tokenId = (new Parser())->parse($bearerToken)->getClaim('jti');
        return Token::find($tokenId)->client;
    }
}
