<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Page;
use App\Pageteacher;
use App\Pageall;
use App\Teacher;
use App\student;
use App\Studentcsv;
use App\teachercsv;
use App\Allcsv;
use DataTables;
use DB;



class PagesController extends Controller{

  public function index(){
    $users = Studentcsv::paginate(5);
    $users2 = Teacher::all();
    return view('admin/importcsv/import')->with('users', $users)->with('users2', $users2);
  }
  public function index2(){
    $users = Allcsv::paginate(5);
    return view('admin/importcsv/import_all')->with('users', $users);
  }
  public function datatable(){
    return DataTables::of(Studentcsv::query())->make(true);
  }

  public function uploadFile(Request $request){

    //DB::table('studentcsvs')->delete();


    if ($request->input('submit') != null ){

      $file = $request->file('file');

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 2097152; 

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'uploads';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata );
             
             // Skip first row (Remove below comment if you want to skip the first row)
             /*if($i == 0){
                $i++;
                continue; 
             }*/
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $importData){

            $insertData = array(
              "teacher_id"=>$importData[1],
              "IDstudent"=>$importData[2],
              "Titlename"=>$importData[3],
              "Fname"=>$importData[4],
              "Lname"=>$importData[5],
              "Titlename_eng"=>$importData[6],
              "Fname_eng"=>$importData[7],
              "Lname_eng"=>$importData[8],
              "Major"=>$importData[9],
              "Faculty"=>$importData[10],
              "course"=>$importData[11],
              "Mail"=>$importData[12],
              "Status"=>$importData[13]);
              
           Page::insertData($insertData);

          }

          Session::flash('message','อัพโหลดข้อมูลเรียบร้อย');
        }else{
          Session::flash('message','File too large. File must be less than 2MB.');
        }

      }else{
         Session::flash('message','กรุณาอัพโหลดเฉพาะไฟล์นามสกุล CSV');
      }

    }

    // Redirect to index
    return redirect()->action('Admin\PagesController@index');
  }
  public function uploadFile2(Request $request){

    //DB::table('allcsvs')->delete();

    if ($request->input('submit') != null ){

      $file = $request->file('file');

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 2097152; 

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'uploads';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata );
             
             // Skip first row (Remove below comment if you want to skip the first row)
             /*if($i == 0){
                $i++;
                continue; 
             }*/
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $importData){

            $insertData2 = array(
              "Titlename"=>$importData[1],
              "Fname"=>$importData[2],
              "Lname"=>$importData[3],
              "Mail"=>$importData[4]);
           Pageall::insertData($insertData2);

          }

          Session::flash('message','อัพโหลดข้อมูลเรียบร้อย');
        }else{
          Session::flash('message','File too large. File must be less than 2MB.');
        }

      }else{
         Session::flash('message','กรุณาอัพโหลดเฉพาะไฟล์นามสกุล CSV');
      }

    }

    // Redirect to index
    return redirect()->action('Admin\PagesController@index2');
  }
}
