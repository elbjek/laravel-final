<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['name', 'gender', 'size', 'weight', 'client_id'];

    public function clients()
    {
        return $this->hasOne(App\Client::class);
    }
    public function appointments()
    {
        return $this->belongsTo(App\Client::class);
    }
}
