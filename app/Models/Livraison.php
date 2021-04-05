<?php

namespace App\Models;

use App\Models\Livreur;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'is_delivered'


    ];

    protected $table = 'livraison'; 
    protected $primaryKey = 'id_phar'; 

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_com', 'id_com');
    }

    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'id_livr', 'id_livr');
    }
}
