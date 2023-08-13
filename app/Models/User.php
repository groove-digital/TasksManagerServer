<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $connection = 'mongodb'; // Spécifiez la connexion MongoDB
    protected $collection = 'users'; // Nom de la collection MongoDB

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

      // Méthodes pour l'implémentation de JWTSubject
      public function getJWTIdentifier()
      {
        return $this->getKey();
      }
  
      public function getJWTCustomClaims()
      {
          return [];
      }
}


