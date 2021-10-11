<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition01 extends Model
{
   

    public function approve() {
        return $this->belongsTo(Approve::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function petition() {
        return $this->belongsTo(Petitionall::class);
    }
    public function studentcsv() {
        return $this->belongsTo(Studentcsv::class);
    }
    
}
 