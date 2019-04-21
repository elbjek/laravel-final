<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'phone_number'];

//    public function groomers() {
//
//        return $this->belongsTo(App\Groomer::class);
//
//    }
    public function pets() {
        return $this->hasMany(App\Pet);
    }
}
