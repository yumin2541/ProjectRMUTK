<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    public function p01() {
        return $this->hasMany(Petition01::class);
    }
    public function p02() {
        return $this->hasMany(Petition02::class);
    }
    public function p03() {
        return $this->hasMany(Petition03::class);
    }
    public function p04() {
        return $this->hasMany(Petition04::class);
    }
    public function p05() {
        return $this->hasMany(Petition05::class);
    }
    public function p06() {
        return $this->hasMany(Petition06::class);
    }
    public function p07() {
        return $this->hasMany(Petition07::class);
    }
    public function p08() {
        return $this->hasMany(Petition08::class);
    }
    
    
}
