<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'social_security_number',
    
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
