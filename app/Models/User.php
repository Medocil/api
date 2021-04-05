<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Adresse;
use App\Models\Livreur;
use App\Models\Pharmacie;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email', 
        'tel', 
        'date_birth', 
        'status',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'user'; 
    protected $primaryKey = 'id_user'; 

    public function adresse()
    {
        return $this->hasOne(Adresse::class, 'id_user');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id_user');
    }

    public function pharmacie()
    {
        return $this->hasOne(Pharmacie::class, 'id_user');
    }

    public function livreur()
    {
        return $this->hasOne(Livreur::class, 'id_user');
    }
}
