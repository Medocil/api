<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commande;
use App\Models\Ordonnance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'num_secu',


    ];

    protected $table = 'client'; 
    protected $primaryKey = 'id_cli'; 

    public function commande()
    {
        return $this->hasMany(Commande::class, 'id_cli', 'id_cli'); 
    }

    public function ordonnance()
    {
        return $this->hasMany(Ordonnance::class, 'id_cli', 'id_cli');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
