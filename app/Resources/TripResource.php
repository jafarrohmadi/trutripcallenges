<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends
    JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'origin'        => $this->origin,
            'destination'   => $this->destination,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
            'type_of_trip'  => $this->type_of_trip,
            'description'   => $this->description,
            'how_many_days' => $this->how_many_days,
        ];
    }

}
