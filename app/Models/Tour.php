<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'travel_id',
        'starting_date',
        'ending_date',
        'price',
        'name'
    ];

}
