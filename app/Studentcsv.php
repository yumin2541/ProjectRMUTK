<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentcsv extends Model
{
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function peti01() {
        return $this->hasMany(Petition01::class);
    }
    public function peti02() {
        return $this->hasMany(Petition02::class);
    }
    public function peti03() {
        return $this->hasMany(Petition03::class);
    }
    public function peti04() {
        return $this->hasMany(Petition04::class);
    }
    public function peti05() {
        return $this->hasMany(Petition05::class);
    }
    public function peti06() {
        return $this->hasMany(Petition06::class);
    }
    public function peti07() {
        return $this->hasMany(Petition07::class);
    }
    public function peti08() {
        return $this->hasMany(Petition08::class);
    }
}
