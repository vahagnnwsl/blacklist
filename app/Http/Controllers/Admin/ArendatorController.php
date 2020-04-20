<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\Http\Requests\ArendatorRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArendatorController extends Controller
{

    public function index(Request $request)
    {

        $region = $request->get('region');
        $key = $request->get('key');

        $arendators = Arendator::when($region, function ($q) use ($region) {
            return $q->where('region', $region);
        })->when($key, function ($q) use ($key) {
            return $q->where('search', 'LIKE', '%' . $key . '%');
        })->whereHas('user')->paginate(20);

        return view('admin.arendators.index', compact('arendators'));
    }

    public function edit($id)
    {
        $arendator = Arendator::findOrFail($id);

        return view('admin.arendators.edit', compact('arendator'));
    }

    public function update(Request $request, $id)
    {
        $rules = ArendatorRequest::rules('update');
        $req = $request->all();


        $validator = Validator::make($req, $rules);



        if ($validator->fails()) {

            return redirect()->route('arendators.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $arendator = Arendator::findOrFail($id);

        $data = $request->all();
        $data['search'] =  implode(" ",Arr::except($data, ['user_id','type','birth_date']));

        $arendator->update($request->all());
        flash()->message('Успешно обновлено!')->success();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Arendator::destroy($id);
        return redirect()->back();
    }
}
