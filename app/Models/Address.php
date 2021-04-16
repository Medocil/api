<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'address',
        'cpostal',
        'latitude',
        'longitude',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
