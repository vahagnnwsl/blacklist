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
        $request->request->add(['user_id' => Auth::id()]);
        $req = $request->all();


        $validator = Validator::make($req, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $fields = Arr::except($req, ['violations']);

        $fields['search'] =  implode(" ",Arr::except($fields, ['user_id','type','birth_date']));


        Arendator::create($fields);

        return response()->json();

    }

    public function get()
    {
        return response()->json(Auth::user()->arendators()->paginate(15, [
            'id', 'first_name', 'last_name', 'patronymic', 'region', 'city', 'type','address','created_at'
        ]));
    }

    public function getSingle($id){
        $arendator = Arendator::whereId($id)->with('violations')->first();

        if(!$arendator){
            return response()->json([],401);

        }

        return response()->json($arendator->data);
    }

    public function violations($id)
    {
        $arendator = Arendator::findOrFail($id);
        return response()->json($arendator->violations);
    }

    public function search(Request $request)
    {
        $region = $request->get('region');
        $key = $request->get('key');

        $arendators = Arendator::when($region, function ($q) use ($region) {
            return $q->where('region', $region);
        })->when($key, function ($q) use ($key) {
            return $q->where('search', 'LIKE', '%' . $key . '%');
        })->with('violations')->paginate(20);

        $resp['total'] = $arendators->total();
        $resp['items'] = [];


        foreach ($arendators as $arendator) {

            array_push($resp['items'],$arendator->data);
        }



        return response()->json($resp);
    }


}
