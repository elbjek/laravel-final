<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['name', 'size', 'weight','user_id'];

    public function clients()
    {
        return $this->belongsTo(App\Client::class);
    }
    public function appointments()
    {
        return $this->belongsTo(App\Appointment::class);
    }
    public function users()
    {
        return $this->HasMany(App\User::class);
    }
}
