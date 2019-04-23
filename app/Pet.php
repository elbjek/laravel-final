<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['name', 'gender', 'size', 'weight'];

    public function clients()
    {
        return $this->belongsTo(App\Client::class);
    }
    public function appointments()
    {
        return $this->belongsTo(App\Appointment::class);
    }
}
