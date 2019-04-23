<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['title', 'description', 'client_id', 'pet_id', 'user_id' ];

    public function pets() {

        return $this->hasMany(\App\Pet::class);

    }

    public function clients()
    {
        return $this->hasMany(\App\Client::class);
    }

    public function users() {

        return $this->hasMany(\App\User::class);
    }
}
