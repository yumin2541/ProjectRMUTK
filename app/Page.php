<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Page extends Model {

   public static function insertData($data){

      $value=DB::table('studentcsvs')->where('IDstudent', $data['IDstudent'])->get();
      if($value->count() == 0){
         DB::table('studentcsvs')->insert($data);
      }
   }
   

}