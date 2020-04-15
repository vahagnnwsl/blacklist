<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArendatorController extends Controller
{

    public function index()
    {
        $arendators = Arendator::paginate(20);
        return view('admin.arendators.index', compact('arendators'));
    }

    public function edit($id)
    {
        $arendator = Arendator::findOrFail($id);
        return view('admin.arendators.edit', compact('arendator'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'register' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'passport_serial' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255'
        ]);

        $arendator = Arendator::findOrFail($id);
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
