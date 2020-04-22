<?php

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

class ArendatorController extends Controller
{


    /**
     * @queryParam key required Like posport , Full name
     * @response {
     *  "total": 1,
     *  "items": [
     * {
     * "id": 205,
     * "type": 1,
     * "full_name": "Vladimir Vladimirovich Putin",
     * "register": "Kreml 1/1",
     * "address": null,
     * "region": "Moscow pr.",
     * "city": "Moscow",
     * "company_name": null,
     * "inn": null,
     * "position": null,
     * "passport": "Ru122121121",
     * "contact_phone": "2323232322",
     * "birth_date": "2020-04-15",
     * "date": "22/04/2020",
     * "violations": [
     * {
     * "user": {
     * "full_name": "Alexandr Navalin Jr.",
     * "contact_email": "Navalin@Alexandr.com",
     * "city": "Moscow",
     * "company_name": null,
     * "contact_phone": 3232323223,
     * "contact_person_full_name": null,
     * "address": "City 12",
     * "type": 1
     * },
     * "date": "2020-04-03",
     * "description": "For corruption",
     * "document": null,
     * "status": 1,
     * "user_id": 65,
     * "id": 483
     * }
     * ]
     * }
     * ]
     * }
     */


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
     *@queryParam user[full_name] required
     *@queryParam user[contact_phone] required
     *@queryParam user[company_name] required
     *@queryParam user[address] required
     *@queryParam user[city] required
     *@queryParam arendator[type] required 1 or 2
     *@queryParam arendator[first_name] required
     *@queryParam arendator[last_name] required
     *@queryParam arendator[patronymic] required
     *@queryParam arendator[patronymic] required
     *@queryParam arendator[contact_phone] required
     *@queryParam arendator[city] required
     *@queryParam arendator[region] required
     *@queryParam arendator[passport_number] required
     *@queryParam arendator[passport_serial] required
     *@queryParam violations[description] required
     *@queryParam violations[status] required 0 or 1
     *@queryParam violations[date] required date like 2020-04-15
     *@queryParam violations[document] optional base_64 string
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
        $userData['is_api_user'] = 1;
        $userData['email'] = 'client_id_' . $userData['client_id'] . '_time_' . time() . '@api.com';
        $userData['type'] = 5;

        try {
            if ($user = User::create($userData)) {
                $arendatorData = $request->get('arendator');
                $arendatorData = Arr::except($arendatorData, ['violations']);
                $arendatorData['user_id'] = $user->id;
                $arendatorData['search'] = implode(" ", Arr::except($arendatorData, ['user_id', 'type', 'birth_date']));
                $violationsData = $request->get('violations');

                $existArendator = $this->existArendator($arendatorData, $violationsData, $user);

                if ($existArendator['exist']) {
                    return response()->json(['msg' => $existArendator['msg']]);
                }


                if ($arendator = Arendator::create($arendatorData)) {

                    if (key_exists('document', $violationsData) && $violationsData['document'] !== null) {
                        $data['document'] = FileUploaderService::arendatorViolationFile($violationsData['document']);
                    }

                    $violationsData['arendator_id'] = $arendator->id;
                    $violationsData['user_id'] = $user->id;
                    ArendatorViolation::create($violationsData);

                }
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

        $client = Token::find($tokenId)->client;

        return $client;
    }


    public function existArendator($arendatorData, $violationsData, $user)
    {


        if ((int)$arendatorData['type'] === 1) {
            $exsitArendator = Arendator::where([
                'passport_serial' => $arendatorData['passport_serial'],
                'passport_number' => $arendatorData['passport_number']
            ])->first();

            $msg = 'Арендатор с этим паспортом уже существует,добавлено только нарушение';

        } else {
            $exsitArendator = Arendator::where([
                'inn' => $arendatorData['inn']
            ])->first();
            $msg = 'Арендатор с этим ИНН уже существует,добавлено только нарушение';
        }

        if ($exsitArendator) {

            $violation['user_id'] = $user->id;
            if (key_exists('document', $violationsData) && $violationsData['document'] !== null) {
                $violationsData['document'] = FileUploaderService::arendatorViolationFile($violationsData['document']);
            }
            $violationsData['arendator_id'] = $exsitArendator->id;
            ArendatorViolation::create($violationsData);

            return ['exist' => true, 'msg' => $msg];
        }

        return ['exist' => false];
    }


}
