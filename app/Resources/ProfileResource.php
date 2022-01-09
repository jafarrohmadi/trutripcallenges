<?php

namespace App\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ProfileResource extends
    JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return ResponseFactory|Response
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }

}
