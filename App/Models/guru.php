<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'guru';
    protected $primaryKey = 'NUPTK';
    protected $fillable = [
        'NUPTK',
        'nama_lengkap',
        'no_hp',
        'password',
    ];

  
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
