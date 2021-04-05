<?php

namespace App\Models;

use App\Models\User;
use App\Models\Livraison;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'num_identite',

    ];

    protected $table = 'livreur'; 
    protected $primaryKey = 'id_livr'; 


    public function livraison()
    {
        return $this->hasMany(Livraison::class, 'id_livr', 'id_livr');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
