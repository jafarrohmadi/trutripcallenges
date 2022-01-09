<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Trip
 * @package App\Models
 */
class Trip extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'user_id',
            'title',
            'origin',
            'destination',
            'start_date',
            'end_date',
            'type_of_trip',
            'description',
            'how_many_days',
        ];

}
