<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'is_delivered'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
