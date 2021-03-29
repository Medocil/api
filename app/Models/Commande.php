<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Livraison;
use App\Models\Pharmacie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'adresse',
        'status',
        'comments',
        'prix'


    ];

    protected $table = 'commande'; 
    protected $primaryKey = 'id_com';

    public function livraison()
    {
        return $this->hasOne(Livraison::class, 'id_com', 'id_com');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cli', 'id_cli'); 
    }

    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_phar', 'id_phar'); 
    }
}
