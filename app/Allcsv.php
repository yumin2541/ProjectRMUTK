<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allcsv extends Model
{
    public function studentcsvs() {
        return $this->hasMany(Studentcsv::class);
    }
    public function studentprofile() {
        return $this->hasMany('App\User');
    }
}
