<?php

namespace App\Http\Controllers\Admin;

use App\Arendator;
use App\ArendatorViolation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\FileUploaderService;

class ArendatorViolationController extends Controller
{


    public function update(Request $request, $id)
    {
        $arendatorViolation = ArendatorViolation::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('document')) {
            $data['document'] = FileUploaderService::arendatorViolationFile($request->file('document'),true);

        }

        $arendatorViolation->update($data);
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

        $data = $request->all();

        if ($request->hasFile('document')) {
            $data['document'] = FileUploaderService::arendatorViolationFile($request->file('document'),true);

        }

        ArendatorViolation::create($data);

        flash()->message('Успешно добавлено!')->success();

        return redirect()->back();
    }
}
