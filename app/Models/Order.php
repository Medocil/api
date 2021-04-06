<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
    'address',
    'status',
    'comments',
    'price'
    
    ];
    
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class); 
    }
    
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class); 
    }
}
