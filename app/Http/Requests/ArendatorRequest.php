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
            $rules['inn'] = 'required|string|max:255';

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


   public static function apiRules() {
       $rules = [
           'user.full_name' => ['required', 'string', 'max:255'],
           'user.contact_phone' => ['required', 'string', 'max:255'],
           'user.company_name' => ['required', 'string', 'max:255'],
           'user.address' => ['required', 'string', 'max:255'],
           'user.city' => ['required', 'string', 'max:255'],

           'arendator.type' => ['required','integer','between:1,2'],
           'arendator.first_name' => ['required', 'string', 'max:255'],
           'arendator.last_name' => ['required', 'string', 'max:255'],
           'arendator.patronymic' => ['required', 'string', 'max:255'],
           'arendator.contact_phone' => ['required', 'string', 'max:255'],
           'arendator.city' => ['required', 'string', 'max:255'],
           'arendator.region' => ['required', 'string', 'max:255'],
           'arendator.passport_number' => ['required', 'string', 'max:255'],
           'arendator.passport_serial' => ['required', 'string', 'max:255'],

           'violations.description' => ['required', 'string', 'max:255'],
           'violations.status' => ['required', 'integer','between:0,1'],
           'violations.date' => ['required', 'date'],

       ];



       if ((int)request('arendator.type') === 1){
           $rules['arendator.birth_date'] = ['required', 'date'];
           $rules['arendator.register'] = ['required', 'string', 'max:255'];
       }else{
           $rules['arendator.inn'] = 'required|string|max:255';
           $rules['arendator.company_name'] = ['required', 'string', 'max:255'];
           $rules['arendator.address'] = ['required', 'string', 'max:255'];

       }




       return $rules;
   }

}
