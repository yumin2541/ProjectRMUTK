<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pageall extends Model
{
    public static function insertData ($data){

        $value=DB::table('allcsvs')->where('Fname', $data['Fname'])->get();
        if($value->count() == 0){
           DB::table('allcsvs')->insert($data);
        }
     }
}
