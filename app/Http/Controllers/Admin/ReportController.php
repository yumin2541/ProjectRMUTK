<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Petition01;
use App\Petition02;
use App\Petition03;
use App\Petition04;
use App\Petition05;
use App\Petition06;
use App\Petition07;
use App\Petition08;
use App\Petitionall;
use App\User;
use App\Approve;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {   
        
        $year = date("Y");
        $users = Petition01::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p2 = Petition02::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p3 = Petition03::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p4 = Petition04::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p5 = Petition05::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p6 = Petition06::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p7 = Petition07::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p8 = Petition08::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        
        $usermcount = [];   $p2count = [];  $p3count = []; $p4count = []; $p5count = []; $p6count = []; $p7count = []; $p8count = [];
        $userArr = [];      $p2Arr = []; $p3Arr = []; $p4Arr = []; $p5Arr = []; $p6Arr = []; $p7Arr = []; $p8Arr = [];
       
        
        
        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }
        foreach ($p2 as $key => $value) {
            $p2count[(int)$key] = count($value);
        }
        foreach ($p3 as $key => $value) {
            $p3count[(int)$key] = count($value);
        }
        foreach ($p4 as $key => $value) {
            $p4count[(int)$key] = count($value);
        }
        foreach ($p5 as $key => $value) {
            $p5count[(int)$key] = count($value);
        }
        foreach ($p6 as $key => $value) {
            $p6count[(int)$key] = count($value);
        }
        foreach ($p7 as $key => $value) {
            $p7count[(int)$key] = count($value);
        }
        foreach ($p8 as $key => $value) {
            $p8count[(int)$key] = count($value);
        }
        
        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p2count[$i])){
                $p2Arr[$i] = $p2count[$i];    
            }else{
                $p2Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p3count[$i])){
                $p3Arr[$i] = $p3count[$i];    
            }else{
                $p3Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p4count[$i])){
                $p4Arr[$i] = $p4count[$i];    
            }else{
                $p4Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p5count[$i])){
                $p5Arr[$i] = $p5count[$i];    
            }else{
                $p5Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p6count[$i])){
                $p6Arr[$i] = $p6count[$i];    
            }else{
                $p6Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p7count[$i])){
                $p7Arr[$i] = $p7count[$i];    
            }else{
                $p7Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p8count[$i])){
                $p8Arr[$i] = $p8count[$i];    
            }else{
                $p8Arr[$i] = 0;    
            }
        }

        $data01 = Petition01::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data02 = Petition02::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data03 = Petition03::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data04 = Petition04::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data05 = Petition05::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data06 = Petition06::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data07 = Petition07::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data08 = Petition08::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data011 = Petition01::all();

        $sum1 = $userArr[1]+$p2Arr[1]+$p3Arr[1]+$p4Arr[1]+$p5Arr[1]+$p6Arr[1]+$p7Arr[1]+$p8Arr[1];
        $sum2 = $userArr[2]+$p2Arr[2]+$p3Arr[2]+$p4Arr[2]+$p5Arr[2]+$p6Arr[2]+$p7Arr[2]+$p8Arr[2];
        $sum3 = $userArr[3]+$p2Arr[3]+$p3Arr[3]+$p4Arr[3]+$p5Arr[3]+$p6Arr[3]+$p7Arr[3]+$p8Arr[3];
        $sum4 = $userArr[4]+$p2Arr[4]+$p3Arr[4]+$p4Arr[4]+$p5Arr[4]+$p6Arr[4]+$p7Arr[4]+$p8Arr[4];
        $sum5 = $userArr[5]+$p2Arr[5]+$p3Arr[5]+$p4Arr[5]+$p5Arr[5]+$p6Arr[5]+$p7Arr[5]+$p8Arr[5];
        $sum6 = $userArr[6]+$p2Arr[6]+$p3Arr[6]+$p4Arr[6]+$p5Arr[6]+$p6Arr[6]+$p7Arr[6]+$p8Arr[6];
        $sum7 = $userArr[7]+$p2Arr[7]+$p3Arr[7]+$p4Arr[7]+$p5Arr[7]+$p6Arr[7]+$p7Arr[7]+$p8Arr[7];
        $sum8 = $userArr[8]+$p2Arr[8]+$p3Arr[8]+$p4Arr[8]+$p5Arr[8]+$p6Arr[8]+$p7Arr[8]+$p8Arr[8];
        $sum9 = $userArr[9]+$p2Arr[9]+$p3Arr[9]+$p4Arr[9]+$p5Arr[9]+$p6Arr[9]+$p7Arr[9]+$p8Arr[9];
        $sum10 = $userArr[10]+$p2Arr[10]+$p3Arr[10]+$p4Arr[10]+$p5Arr[10]+$p6Arr[10]+$p7Arr[10]+$p8Arr[10];
        $sum11 = $userArr[11]+$p2Arr[11]+$p3Arr[11]+$p4Arr[11]+$p5Arr[11]+$p6Arr[11]+$p7Arr[11]+$p8Arr[11];
        $sum12 = $userArr[12]+$p2Arr[12]+$p3Arr[12]+$p4Arr[12]+$p5Arr[12]+$p6Arr[12]+$p7Arr[12]+$p8Arr[12];
    

        $sum = Array($sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$sum12);

        return view('admin\histroy_petition\report')    ->with('years', $year) ->with('sums', $sum)
        ->with('userArrs', $userArr) 
        ->with('p2Arrs', $p2Arr)
        ->with('p3Arrs', $p3Arr)
        ->with('p4Arrs', $p4Arr)
        ->with('p5Arrs', $p5Arr) 
        ->with('p6Arrs', $p6Arr)
        ->with('p7Arrs', $p7Arr)
        ->with('p8Arrs', $p8Arr)
        ->with('datas08', $data08)
        ->with('datas07', $data07)
        ->with('datas06', $data06)
        ->with('datas05', $data05) 
        ->with('datas04', $data04)
        ->with('datas03', $data03)
        ->with('datas02', $data02)
        ->with('datas011', $data011)
        ->with('datas01', $data01);
    }



    public function test(Request $request)
    {   

        $year = $request->test - 543;

        $users = Petition01::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p2 = Petition02::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p3 = Petition03::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p4 = Petition04::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p5 = Petition05::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p6 = Petition06::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p7 = Petition07::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        $p8 = Petition08::select('id', 'updated_at')
        ->whereYear('updated_at', '=', $year)
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->updated_at)->format('m'); // grouping by months
        });
        
        $usermcount = [];   $p2count = [];  $p3count = []; $p4count = []; $p5count = []; $p6count = []; $p7count = []; $p8count = [];
        $userArr = [];      $p2Arr = []; $p3Arr = []; $p4Arr = []; $p5Arr = []; $p6Arr = []; $p7Arr = []; $p8Arr = [];
       
        
        
        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }
        foreach ($p2 as $key => $value) {
            $p2count[(int)$key] = count($value);
        }
        foreach ($p3 as $key => $value) {
            $p3count[(int)$key] = count($value);
        }
        foreach ($p4 as $key => $value) {
            $p4count[(int)$key] = count($value);
        }
        foreach ($p5 as $key => $value) {
            $p5count[(int)$key] = count($value);
        }
        foreach ($p6 as $key => $value) {
            $p6count[(int)$key] = count($value);
        }
        foreach ($p7 as $key => $value) {
            $p7count[(int)$key] = count($value);
        }
        foreach ($p8 as $key => $value) {
            $p8count[(int)$key] = count($value);
        }
        
        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p2count[$i])){
                $p2Arr[$i] = $p2count[$i];    
            }else{
                $p2Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p3count[$i])){
                $p3Arr[$i] = $p3count[$i];    
            }else{
                $p3Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p4count[$i])){
                $p4Arr[$i] = $p4count[$i];    
            }else{
                $p4Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p5count[$i])){
                $p5Arr[$i] = $p5count[$i];    
            }else{
                $p5Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p6count[$i])){
                $p6Arr[$i] = $p6count[$i];    
            }else{
                $p6Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p7count[$i])){
                $p7Arr[$i] = $p7count[$i];    
            }else{
                $p7Arr[$i] = 0;    
            }
        }
        for($i = 1; $i <= 12; $i++){
            if(!empty($p8count[$i])){
                $p8Arr[$i] = $p8count[$i];    
            }else{
                $p8Arr[$i] = 0;    
            }
        }

        $data01 = Petition01::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data02 = Petition02::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data03 = Petition03::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data04 = Petition04::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data05 = Petition05::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data06 = Petition06::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data07 = Petition07::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        $data08 = Petition08::select('id', 'updated_at')->whereYear('updated_at', '=', $year)->count();
        
        $sum1 = $userArr[1]+$p2Arr[1]+$p3Arr[1]+$p4Arr[1]+$p5Arr[1]+$p6Arr[1]+$p7Arr[1]+$p8Arr[1];
        $sum2 = $userArr[2]+$p2Arr[2]+$p3Arr[2]+$p4Arr[2]+$p5Arr[2]+$p6Arr[2]+$p7Arr[2]+$p8Arr[2];
        $sum3 = $userArr[3]+$p2Arr[3]+$p3Arr[3]+$p4Arr[3]+$p5Arr[3]+$p6Arr[3]+$p7Arr[3]+$p8Arr[3];
        $sum4 = $userArr[4]+$p2Arr[4]+$p3Arr[4]+$p4Arr[4]+$p5Arr[4]+$p6Arr[4]+$p7Arr[4]+$p8Arr[4];
        $sum5 = $userArr[5]+$p2Arr[5]+$p3Arr[5]+$p4Arr[5]+$p5Arr[5]+$p6Arr[5]+$p7Arr[5]+$p8Arr[5];
        $sum6 = $userArr[6]+$p2Arr[6]+$p3Arr[6]+$p4Arr[6]+$p5Arr[6]+$p6Arr[6]+$p7Arr[6]+$p8Arr[6];
        $sum7 = $userArr[7]+$p2Arr[7]+$p3Arr[7]+$p4Arr[7]+$p5Arr[7]+$p6Arr[7]+$p7Arr[7]+$p8Arr[7];
        $sum8 = $userArr[8]+$p2Arr[8]+$p3Arr[8]+$p4Arr[8]+$p5Arr[8]+$p6Arr[8]+$p7Arr[8]+$p8Arr[8];
        $sum9 = $userArr[9]+$p2Arr[9]+$p3Arr[9]+$p4Arr[9]+$p5Arr[9]+$p6Arr[9]+$p7Arr[9]+$p8Arr[9];
        $sum10 = $userArr[10]+$p2Arr[10]+$p3Arr[10]+$p4Arr[10]+$p5Arr[10]+$p6Arr[10]+$p7Arr[10]+$p8Arr[10];
        $sum11 = $userArr[11]+$p2Arr[11]+$p3Arr[11]+$p4Arr[11]+$p5Arr[11]+$p6Arr[11]+$p7Arr[11]+$p8Arr[11];
        $sum12 = $userArr[12]+$p2Arr[12]+$p3Arr[12]+$p4Arr[12]+$p5Arr[12]+$p6Arr[12]+$p7Arr[12]+$p8Arr[12];
    

        $sum = Array($sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$sum12);
        return view('admin\histroy_petition\report')   ->with('years', $year) ->with('sums', $sum)
        ->with('userArrs', $userArr) 
        ->with('p2Arrs', $p2Arr)
        ->with('p3Arrs', $p3Arr)
        ->with('p4Arrs', $p4Arr)
        ->with('p5Arrs', $p5Arr) 
        ->with('p6Arrs', $p6Arr)
        ->with('p7Arrs', $p7Arr)
        ->with('p8Arrs', $p8Arr)
        ->with('datas08', $data08)
        ->with('datas07', $data07)
        ->with('datas06', $data06)
        ->with('datas05', $data05) 
        ->with('datas04', $data04)
        ->with('datas03', $data03)
        ->with('datas02', $data02)
        ->with('datas01', $data01);

     
    }
}
