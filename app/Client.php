<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name', 'client_lastname', 'email', 'phone_number', 'pet_id', 'user_id'];

    public function appointments() {

        return $this->belongsTo(App\Appointment::class);

    }
    public function pets() {
        return $this->hasMany(App\Pet);
    }
    public function users() {
        return $this->hasMany(App\Pet);
    }
}
