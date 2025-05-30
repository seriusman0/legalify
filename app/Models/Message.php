<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'whatsapp',
        'email',
        'subject',
        'message',
        'status'
    ];

    protected $attributes = [
        'status' => 'unread'
    ];
}
