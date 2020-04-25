<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    protected $con;

    public function __construct($resource, $con = false)
    {
        parent::__construct($resource);
        $this->con = $con;

    }


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        if ($this->con) {
            return $this->order();
        }

        return [
            'id' => $this->id,
            'email' => $this->email,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->contact_phone,
            'type' => $this->type,
            $this->mergeWhen((int)$this->type === config('constants.user.individual'), [
                'full_name' => $this->full_name,
                'passport' => $this->passport,
            ]),
            $this->mergeWhen((int)$this->type === config('constants.user.juridical') || (int)$this->type === config('constants.user.individual-entrepreneur'), [
                'inn' => $this->inn,
                'company_name' => $this->company_name,
                'contact_person_full_name' => $this->contact_person_full_name,
                'contact_person_position' => $this->contact_person_position,
            ]),
            $this->mergeWhen((int)$this->type === config('constants.user.admin') || (int)$this->type === config('constants.user.api'), [
                'full_name' => $this->full_name,
            ]),
        ];

    }

    public function order()
    {

        return [
            'contact' => [
                'email' => $this->email,
                'about_business' => $this->about_business,
                'contact_person_full_name' => $this->contact_person_full_name,
                'contact_phone' => $this->contact_phone,
                $this->mergeWhen((int)$this->type !== config('constants.user.individual'), [
                    'contact_person_position' => $this->contact_person_position,
                ]),
            ],

            'basic' => [
                'inn' => $this->inn,
                'country' => $this->country,
                'city' => $this->city,
                'address' => $this->address,
                'doc' => $this->doc,
                'web_site' => $this->web_site,
                'advertising_number' => $this->advertising_number,
                'real_estate_count' => $this->real_estate_count,
                $this->mergeWhen((int)$this->type === config('constants.user.individual'), [
                    'passport' => $this->passport,
                    'full_name' => $this->full_name
                ]),
                $this->mergeWhen((int)$this->type !== config('constants.user.individual'), [
                    'brand' => $this->brand,
                    'company_name' => $this->company_name
                ]),
                $this->mergeWhen((int)$this->type === config('constants.user.juridical'), [
                    'psrn' => $this->psrn,
                ]),
                $this->mergeWhen((int)$this->type === config('constants.user.individual-entrepreneur'), [
                    'psrnie' => $this->psrnie,
                ]),
            ]
        ];

    }


}
