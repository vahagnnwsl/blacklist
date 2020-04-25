<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArendatorViolation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'date' => $this->date,
            $this->mergeWhen($this->document !== null, [
                'document' => '/storage/'.$this->document
            ]),
            'description' => $this->description,
            'user' => new User($this->user)
        ];
    }
}
