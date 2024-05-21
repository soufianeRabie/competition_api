<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'roles_id', 'prenom', 'nom', 'email', 'password', 'remember_token', 'created_at', 'updated_at'
    ];

    // Define relationships if any
}