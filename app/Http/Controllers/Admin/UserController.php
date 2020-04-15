<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('type', '!=', 1)->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $method = $request->get('method');

        $rules = UserRequest::$method($user);

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)
                ->withErrors($validator)
                ->withInput();
        }
        $user->update($request->all());
        flash()->message('Успешно обновлено!')->success();

        return redirect()->back();
    }

}
