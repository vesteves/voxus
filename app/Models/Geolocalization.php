<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude'
    ];

    /**
     * Get the user that owns the location.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
