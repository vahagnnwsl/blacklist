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

    public function update(Request $request)
    {
        return redirect()->back();
    }

    public function destroy($id)
    {
        Arendator::destroy($id);
        return redirect()->back();
    }
}
