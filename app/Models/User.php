<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'company_name',
        'business_type',
        'address',
        'subscription_plan',
        'account_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}