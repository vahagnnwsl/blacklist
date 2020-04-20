<?php

namespace App\Http\Controllers\Admin;

use App\Services\FileUploaderService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request)
    {

        $key = $request->get('key');

        $users = User::where('type', '>', 1)->where(function ($query) use ($key) {
            return $query->where('email', 'Like', '%' . $key . '%')
                ->orWhere('inn', 'Like', '%' . $key . '%')
                ->orWhere('ie_name', 'Like', '%' . $key . '%')
                ->orWhere('company_name', 'Like', '%' . $key . '%')
                ->orWhere('full_name', 'Like', '%' . $key . '%')
                ->orWhere('psrnie', 'Like', '%' . $key . '%')
                ->orWhere('psrn', 'Like', '%' . $key . '%')
                ->orWhere('passport', 'Like', '%' . $key . '%')
                ->orWhere('country', 'Like', '%' . $key . '%')
                ->orWhere('city', 'Like', '%' . $key . '%')
                ->orWhere('address', 'Like', '%' . $key . '%')
                ->orWhere('web_site', 'Like', '%' . $key . '%')
                ->orWhere('contact_phone', 'Like', '%' . $key . '%')
                ->orWhere('contact_person_full_name', 'Like', '%' . $key . '%');
        })->paginate(20);

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

        $data = $request->all();

        if (Arr::exists($data, 'document')) {
            $data['document'] = FileUploaderService::document($data['document']);
        }

        $user->update($data);

        flash()->message('Успешно обновлено!')->success();

        return redirect()->back();
    }

}
