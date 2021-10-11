<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pageteacher extends Model
{
    public static function insertData ($data){

        $value=DB::table('teachercsvs')->where('Fname', $data['Fname'])->get();
        if($value->count() == 0){
           DB::table('teachercsvs')->insert($data);
        }
     }
}
