<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function p04() {
        return $this->hasMany(Petition04::class);
    }
}
