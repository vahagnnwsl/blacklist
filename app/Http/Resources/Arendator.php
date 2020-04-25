<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Arendator extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */


    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'type' => $this->type,
            'full_name' => $this->fullName,
            'passport_serial' => $this->passport_serial,
            'passport_number' => $this->passport_number,
            'phone' => $this->contact_phone,
            'region' => $this->region,
            'city' => $this->city,
            'date' => $this->created_at->format('Y-m-d'),
            $this->mergeWhen((int)$this->type === config('constants.arendator.individual'), [
                'register' => $this->register,
                'birth_date' => $this->birth_date,
            ]),
            $this->mergeWhen((int)$this->type === config('constants.arendator.individual-entrepreneur'), [
                'company_name' => $this->company_name,
                'address' => $this->address,
                'inn' => $this->inn,
            ]),
            'violations' => new ArendatorViolationCollection($this->violations),
            'user' => new User($this->user)
        ];

    }


}
