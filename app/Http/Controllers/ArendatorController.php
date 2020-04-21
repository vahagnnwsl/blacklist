<?php

namespace App\Http\Controllers;

use App\Arendator;
use App\ArendatorViolation;
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



        if ((int)$request->get('type') === 1) {
            $arendator = Arendator::where([
                'passport_serial' => $request->get('passport_serial'),
                'passport_number' => $request->get('passport_number')
            ])->first();

            $msg = 'Арендатор с этим паспортом уже существует,добавлено только нарушение';

        }else {
            $arendator = Arendator::where([
                'inn' => $request->get('inn')
            ])->first();
            $msg = 'Арендатор с этим ИНН уже существует,добавлено только нарушение';
        }
        if ($arendator) {
            foreach ($request->get('violations') as $violation) {
                $violation['user_id'] = Auth::id();
                if (key_exists('document', $violation) && $violation['document'] !== null) {
                    $violation['document'] = FileUploaderService::arendatorViolationFile($violation['document']);
                }
                $violation['arendator_id'] = $arendator->id;
                ArendatorViolation::create($violation);
            }

            return response()->json(['msg'=>$msg]);
        }


        Arendator::create($fields);

        return response()->json();

    }




    public function get()
    {

        return response()->json(Arendator::whereIn('id',Auth::user()->arendatorsByViolations())->paginate(15, [
            'id', 'first_name', 'last_name', 'patronymic', 'region', 'city', 'type','address','created_at','company_name'
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
        })->whereHas('user')->with('violations')->paginate(20);

        $resp['total'] = $arendators->total();
        $resp['items'] = [];


        foreach ($arendators as $arendator) {

            array_push($resp['items'],$arendator->data);
        }



        return response()->json($resp);
    }


}
