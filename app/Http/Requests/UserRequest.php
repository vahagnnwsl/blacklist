<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class UserRequest
{
    public static function password()
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }


    public static function contact($user = false)
    {
        $type = Auth::user()->type;

        if ($user) {
            $type = $user->type;
        }

        $rules = [
            'contact_person_full_name' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'about_business' => ['max:2000'],
        ];

        if ($type > 2) {
            $rules = array_merge($rules, [
                'contact_person_position' => ['required', 'string', 'max:255'],
            ]);
        }

        return $rules;
    }

    public static function basic($user = false)
    {
        $type = Auth::user()->type;

        if ($user) {
            $type = $user->type;
        }

        $rules = [
            'inn' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['max:255'],
            'advertising_number' => ['max:255'],
            'web_site' => ['max:255'],
            'real_estate_count' => ['numeric', 'min:1', 'max:10000'],
        ];

        if ($type === 2) {
            $rules = array_merge($rules, [
                'passport' => ['required', 'string', 'max:255'],
                'full_name' => ['required', 'string', 'max:255'],
            ]);
        } else {

            $rules = array_merge($rules, [
                'brand' => ['required', 'string', 'max:255'],
                'company_name' => ['required', 'string', 'max:255'],
            ]);

            if (request()->hasFile('document')) {
                $rules = array_merge($rules, [
                    'document' => ['mimes:jpg,png,pdf,jpeg,gif,tiff', 'max:7000']
                ]);
            }

            if ($type === 3) {
                $rules = array_merge($rules, [
                    'psrn' => ['required', 'string', 'max:255'],
                ]);
            } else {
                $rules = array_merge($rules, [
                    'psrnie' => ['required', 'string', 'max:255'],
                ]);
            }
        }

        return $rules;
    }

}
