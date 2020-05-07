<?php

namespace App\Http\Controllers;

use App\Services\FileUploaderService;
use App\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Resources\User as UserJson;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('account.index');
    }

    public function profile()
    {


// Creating a token with scopes...
        return view('account.profile');
    }

    public function updateData(Request $request, $method)
    {


        $rules = UserRequest::$method();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }

        $data = $request->all();

        if ($request->hasFile('document')) {
            UserDocument::create([
                'user_id' => Auth::user()->id,
                'path' => FileUploaderService::document($request->file('document'))
            ]);
        }

        Auth::user()->update($data);

        $resp = [];

        if ($method === 'basic') {
            $resp = new UserJson(Auth::user(), true);
        }

        return response()->json($resp, 200);
    }

    public function updatePassword(Request $request)
    {
        $rules = UserRequest::password();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 411);
        }
        $current_password = Auth::user()->password;

        if (Hash::check($request->get('current_password'), $current_password)) {

            Auth::user()->password = Hash::make($request->get('password'));;
            Auth::user()->save();

            return response()->json([], 200);
        }

        return response()->json(['error' => 'Текущий пароль не совпадает'], 411);
    }

}
