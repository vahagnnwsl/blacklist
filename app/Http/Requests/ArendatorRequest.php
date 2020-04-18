<?php

namespace App\Http\Requests;

class ArendatorRequest
{
    public static function rules($action)
    {
        $rules = [
            'type' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'passport_number' => ['required', 'string', 'max:255'],
            'passport_serial' => ['required', 'string', 'max:255'],
        ];

        if ((int)request()->get('type') === 2)
        {
            $rules['inn'] = 'required|string|max:255|unique:arendators,inn';

            $rules['company_name'] = ['required', 'string', 'max:255'];
            $rules['address'] = ['required', 'string', 'max:255'];

            if ($action === 'update'){
                $rules['inn'] =$rules['inn'] .','.request()->route('arendator');
            }

        }else{
            $rules['birth_date'] = ['required', 'date'];

            $rules['register'] = ['required', 'string', 'max:255'];
        }

        if ($action === 'store') {

            $rules['violations.*.description'] = ['required', 'string'];
            $rules['violations.*.status'] = ['required'];
            $rules['violations.*.date'] = ['required', 'date'];

        }



        return $rules;
    }

}
