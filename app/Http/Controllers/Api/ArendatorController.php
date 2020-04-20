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
     * Create a new controller instance.
     *
     * @return void
     */
    public $client;

    public function __construct()
    {
        $bearerToken = request()->bearerToken();
        $tokenId = (new Parser())->parse($bearerToken)->getClaim('jti');
        $this->client = Token::find($tokenId)->client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
        $key = $request->get('key');

        $arendators = Arendator::where('search', 'LIKE', '%' . $key . '%')->with('violations')->get();

        if ($arendators) {
            $resp['total'] = count($arendators);
            $resp['items'] = [];

            foreach ($arendators as $arendator) {

                array_push($resp['items'], $arendator->data);
            }

            return response()->json($resp);
        }


        return response()->json([]);

    }


    public function store(Request $request)
    {

        $rules = ArendatorRequest::apiRules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $userData = $request->get('user');
        $userData['client_id'] = $request->get('client')['id'];
        $userData['is_api_user'] = 1;
        $userData['email'] = 'client_id_' . $userData['client_id'] . '_time_' . time() . '@api.com';
        $userData['type'] = 5;

        try {
            if ($user = User::create($userData)) {
                $arendatorData = $request->get('arendator');
                $arendatorData = Arr::except($arendatorData, ['violations']);
                $arendatorData['user_id'] = $user->id;
                $arendatorData['search'] = implode(" ", Arr::except($arendatorData, ['user_id', 'type', 'birth_date']));

                if ($arendator = Arendator::create($arendatorData)) {
                    $violationsData = $request->get('violations');
                    if (key_exists('document', $violationsData) && $violationsData['document'] !== null) {
                        $data['document'] = FileUploaderService::arendatorViolationFile($violationsData['document']);
                    }
                    $violationsData['arendator_id'] = $arendator->id;
                    $violationsData['user_id'] = $user->id;
                    ArendatorViolation::create($violationsData);

                }
            }

            return response()->json([]);

        } catch (\Exception $exception) {

            return response()->json(['error' => $exception->getMessage()], 411);

        }
    }
}
