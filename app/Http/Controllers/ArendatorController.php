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

        if ((int)$request->get('type') === 1) {
            $arendator = Arendator::where([
                'passport_serial' => $request->get('passport_serial'),
                'passport_number' => $request->get('passport_number')
            ])->first();
            if ($arendator) {
                return response()->json(['passport' => ['Пользователь с этим паспортом уже существует']], 411);
            }
        }


        $fields = Arr::except($req, ['violations', 'document']);

        $fields['search'] = $fields['first_name'] . ' ' . $fields['last_name'] . ' ' . $fields['patronymic'] . ' ' . $fields['contact_phone'];

        if (key_exists('inn', $fields)) {
            $fields['search'] = $fields['search'] . ' ' . $fields['inn'];
        }

        if (key_exists('passport_serial', $fields)) {
            $fields['search'] = $fields['search'] . ' ' . $fields['passport_serial'] . $fields['passport_number'];
        }

        Arendator::create($fields);

        return response()->json();

    }

    public function get()
    {
        return response()->json(Auth::user()->arendators()->paginate(10, [
            'id', 'first_name', 'last_name', 'patronymic', 'region', 'city', 'type'
        ]));
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

            $array = [
                'id' => $arendator->id,
                'full_name' => $arendator->fullName,
                'register' => $arendator->register,
                'contact_phone' => $arendator->contact_phone,
                'birth_date' => $arendator->birth_date,
                'city' => $arendator->city,
                'date' => $arendator->created_at->format('d/m/Y')
            ];
            $array['violations'] = [];
            foreach ($arendator->violations as $violation) {
                array_push($array['violations'],[
                    'full_name' => $violation->user->full_name,
                    'date' => $violation->date,
                    'description' => $violation->description,
                ]);
            }

            array_push($resp['items'],$array);
        }



        return response()->json($resp);
    }


}
