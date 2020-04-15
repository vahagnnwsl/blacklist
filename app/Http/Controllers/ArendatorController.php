<?php

namespace App\Http\Controllers;

use App\Arendator;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;
use App\Http\Requests\ArendatorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class ArendatorController extends Controller
{

    public function store(Request $request)
    {

        $rules = ArendatorRequest::rules('store');
        $request->request->add(['user_id'=>Auth::id()]);
        $req = $request->all();
        $req['violations'] = json_decode($req['violations']);

        $validator = Validator::make($req, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }


        $fields = Arr::except($req, ['violations','document']);

        Arendator::create($fields);

        return response()->json();

    }
}
