<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petitionall extends Model
{
    
    public function petition1() {
        return $this->hasMany(Petition01::class);
    }
    public function petition2() {
        return $this->hasMany(Petition02::class);
    }
    public function petition3() {
        return $this->hasMany(Petition03::class);
    }
    public function petition4() {
        return $this->hasMany(Petition04::class);
    }
    public function petition5() {
        return $this->hasMany(Petition05::class);
    }
    public function petition6() {
        return $this->hasMany(Petition06::class);
    }
    public function petition7() {
        return $this->hasMany(Petition07::class);
    }
    public function petition8() {
        return $this->hasMany(Petition08::class);
    }
}
