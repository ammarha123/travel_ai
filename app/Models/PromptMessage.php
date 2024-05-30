<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptMessage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->hasMany(ActivitiesRecommendation::class, 'prompt_id');
    }

    public function hotels()
    {
        return $this->hasMany(HotelsRecommended::class, 'prompt_id');
    }

    public function restaurants()
    {
        return $this->hasMany(RestaurantsRecommended::class, 'prompt_id');
    }
}
