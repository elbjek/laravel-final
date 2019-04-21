<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['title', 'description', 'pet_id', 'user_id' ];

    public function pets() {
        return $this->hasOne(\App\Pet::class);
    }
    public function users() {
        return $this->belongsTo(\App\User::class);
    }
}
