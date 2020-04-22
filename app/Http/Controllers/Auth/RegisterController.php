<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Arr;
use App\Services\FileUploaderService;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public $allowRegistrationRoles;

    public function showRegistrationForm($type)
    {

        if (!array_key_exists (request()->route('type'), $this->allowRegistrationRoles)) {
            abort(404);
        }

        return view('auth.registration.' . $type, compact('type'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->allowRegistrationRoles = Arr::except(config('constants.user'), ['admin']);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    {
        $type = $data['type'];

        if (!array_key_exists($type,  $this->allowRegistrationRoles)) {
            abort(404);
        }

        $array = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['max:255'],
            'advertising_number' => ['max:255'],
            'web_site' => ['max:255'],
            'real_estate_count' => ['numeric', 'min:1', 'max:10000'],
            'contact_person_full_name' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'about_business' => ['max:2000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if ($type === 'individual') {

            $array = array_merge($array, [
                'passport' => ['required', 'string', 'max:255'],
                'full_name' => ['required', 'string', 'max:255'],
                'inn' => ['max:255'],

            ]);

        } elseif ($type === 'individual-entrepreneur') {
            $array = array_merge($array, [
                'company_name' => ['required', 'string', 'max:255'],
                'psrnie' => ['required', 'string', 'max:255'],
                'brand' => ['required', 'string', 'max:255'],
                'document' => ['required', 'mimes:pdf', 'max:10000'],
                'contact_person_position' => ['required', 'string', 'max:255'],
                'inn' => ['required', 'string', 'max:255'],

            ]);

        } else {
            $array = array_merge($array, [
                'company_name' => ['required', 'string', 'max:255'],
                'psrn' => ['required', 'string', 'max:255'],
                'brand' => ['required', 'string', 'max:255'],
                'document' => ['required', 'mimes:jpg,png,pdf,jpeg,gif,tiff', 'max:7000'],
                'contact_person_position' => ['required', 'string', 'max:255'],
            ]);
        }

        return Validator::make($data, $array);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $data['type'] = $this->allowRegistrationRoles[$data['type']];
        $data['status'] = 0;
        $data['password'] =Hash::make($data['password']);

        if (Arr::exists($data, 'document')){
            $data['document'] = FileUploaderService::document($data['document']);
        }

        return User::create($data);
    }
}
