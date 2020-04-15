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
            'passport_serial' => ['required', 'string', 'max:255'],
            'passport_number' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'register' => ['max:255'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'inn' => ['max:255'],
            'birth_date' => ['required', 'date'],
        ];

        if ($action === 'store')
        {
            $rules['violations.*.description'] = ['required', 'string', 'max:255'];
            $rules['violations.*.status'] = ['required', 'string', 'max:255'];
            $rules['violations.*.date'] = ['required', 'date'];

        }

        return $rules;
    }

}
