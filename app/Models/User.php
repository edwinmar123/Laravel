<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documento',
        'nombres',
        'apellidos',
        'correo',
        'saldo_inicial',
        'ciudad_nacimiento',
        'password',
    ];

    /**
     *
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];
}