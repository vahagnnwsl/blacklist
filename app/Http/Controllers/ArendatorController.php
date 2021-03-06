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
use App\Http\Resources\ArendatorCollection;
use App\Http\Resources\Arendator as ArendatorJson;

class ArendatorController extends Controller
{

    public function index()
    {

        return response()->json(new ArendatorCollection(Arendator::whereIn('id', Auth::user()->arendatorsByViolations())->where('status', 1)->get(),true));
    }

    public function store(Request $request)
    {

        $rules = ArendatorRequest::rules('store');
        $request->request->add(['user_id' => Auth::id()]);
        $req = $request->all();

        $validator = Validator::make($req, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $fields = Arr::except($req, ['violation']);
        $fields['search'] = implode(" ", Arr::except($fields, ['user_id', 'type', 'birth_date']));

        $arendator = Arendator::exist($fields)->first();

        $msg = 'Арендатор  уже существует,добавлено только нарушение';

        if (!$arendator) {
            $arendator = Arendator::create($fields);
            $msg = 'Добавлено';
        }


        $violation = $request->get('violation');
        $violation['user_id'] = Auth::id();

        if (key_exists('document', $violation) && $violation['document'] !== null) {
            $violation['document'] = FileUploaderService::arendatorViolationFile($violation['document']);
        }


        $arendator->violations()->createMany([$violation]);


        return response()->json(['msg' => $msg]);

    }



    public function getSingle($id)
    {
        $arendator = Arendator::whereId($id)->where('status', 1)->with('violations')->first();

        if (!$arendator) {
            return response()->json([], 401);
        }


//        if (Auth::check()) {
//            usort($array['violations'], function ($item1, $item2) {
//                if ($item1['user_id'] === Auth::id() && $item2['user_id'] === Auth::id()) return 0;
//                return $item1['user_id'] === Auth::id() && $item2['user_id'] !== Auth::id() ? -1 : 1;
//            });
//        }

        return response()->json(new ArendatorJson($arendator));

    }

    public function search(Request $request)
    {
        $arendators = Arendator::searchAll($request->get('region'), $request->get('key'))->take(20)->get();
        return response()->json(new ArendatorCollection($arendators));
    }


}
