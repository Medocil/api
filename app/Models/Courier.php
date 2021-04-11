<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'identity_number',
        'kbis_file',
        'criminal_record'
    ];
    
    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
