<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adresse extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'adresse',
        'cpostal'


    ];

    protected $table = 'adresse'; 
    protected $primaryKey = 'id_adr'; 

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
