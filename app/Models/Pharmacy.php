<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'siret_number'
    ];
    
    public function order()
    {
        return $this->hasMany(Order::class); 
    }
    
    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
