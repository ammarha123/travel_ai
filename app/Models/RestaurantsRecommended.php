<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantsRecommended extends Model
{
    use HasFactory;

    protected $fillable = ['prompt_id', 'name', 'details'];

    public function prompt()
    {
        return $this->belongsTo(PromptMessage::class, 'prompt_id');
    }
}
