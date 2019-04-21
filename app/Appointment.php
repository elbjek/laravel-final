<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['title', 'description', 'pet_id'];

    //add groomers id

    public function pets() {
        return $this->hasOne(App\Pet::class);
    }
}
