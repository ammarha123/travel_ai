<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'start_date',
        'end_date',
        'catering_budget',
        'accommodation_budget',
        'travel_style',
    ];
}
