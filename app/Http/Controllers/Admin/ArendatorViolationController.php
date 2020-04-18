<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\ArendatorViolation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArendatorViolationController extends Controller
{


    public function update(Request $request, $id)
    {
        $arendatorViolation = ArendatorViolation::findOrFail($id);
        $arendatorViolation->update($request->all());
        flash()->message('Успешно обновлено!')->success();

        return redirect()->back()->with('arendatorViolation_id',$arendatorViolation->id);

    }

    public function destroy($id)
    {
        ArendatorViolation::destroy($id);
        flash()->message('Успешно удален!')->success();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string',
            'date' => 'required|date',
        ]);
        $request->request->add(['user_id'=>Auth::id()]);
        ArendatorViolation::create($request->all());

        flash()->message('Успешно добавлено!')->success();

        return redirect()->back();
    }
}
