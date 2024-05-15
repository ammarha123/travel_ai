<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'email',
        'status', // Add status to the fillable attributes
    ];

    protected $attributes = [
        'status' => 0, // Default status is 0 (unread)
    ];
}
