<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Pharmacie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordonnance extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'date_envoie',
        'date_reception',


    ];

    protected $table = 'ordonnance'; 
    protected $primaryKey = 'id_ord';

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cli', 'id_cli');
    }

    public function pharmacie()
    {
        return $this->belongsTo(Pharmacie::class, 'id_phar', 'id_phar');
    }
}
