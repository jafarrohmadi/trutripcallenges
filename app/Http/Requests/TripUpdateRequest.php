<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class TripUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|max:50',
            'origin'        => 'required|max:50',
            'destination'   => 'required|max:50|different:origin',
            'start_date'    => 'required|date',
            'end_date'      => 'required|after_or_equal:start_date',
            'type_of_trip'  => 'required|max:50',
            'description'   => 'max:255',
        ];
    }
}
