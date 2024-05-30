<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesRecommendation extends Model
{
    use HasFactory;

    protected $fillable = ['prompt_id', 'day', 'activity'];

    public function prompt()
    {
        return $this->belongsTo(PromptMessage::class, 'prompt_id');
    }
}

