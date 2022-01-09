<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollection extends
    ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AnonymousResourceCollection
     */
    public function toArray($request)
    {
        return TripResource::collection($this->collection);
    }
}
