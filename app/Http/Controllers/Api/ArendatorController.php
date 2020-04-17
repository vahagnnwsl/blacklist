<?php

namespace App\Http\Controllers\Api;

use App\Arendator;
use App\Http\Requests\ArendatorRequest;
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

    public function __construct(){
        $bearerToken = request()->bearerToken();
        $tokenId = (new Parser())->parse($bearerToken)->getClaim('jti');
        $this->client = Token::find($tokenId)->client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function store(Request $request)
    {

        $rules = ArendatorRequest::rules('store');
        $request->request->add(['client_id'=>$request->get('client')->id]);
        $req = $request->all();


        $validator = Validator::make($req, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $fields = Arr::except($req, ['violations','document','client']);

        Arendator::create($fields);

        return response()->json();

    }
}
