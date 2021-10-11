<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Studentcsv;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/loginwithgoogle');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
Route::get('/profile2', 'Admin\ProfileController@index2')->name('profile2');


Route::get('/report', 'Admin\ReportController@index')->name('report');
Route::get('/report2019', 'Admin\ReportController@index2019')->name('report2019');

Route::get('/admin/users/1', 'Admin\UserController@index1');
Route::get('/admin/users/2', 'Admin\UserController@index2');
Route::get('/admin/users/3', 'Admin\UserController@index3');
Route::get('/admin/users/4', 'Admin\UserController@index4');
Route::get('/admin/users/5', 'Admin\UserController@index5');

Route::post('/report123', 'Admin\ReportController@test')->name('test');

Route::get('/show', 'Student\UpdateDataController@create')->name('show');;
Route::get('/index', 'Student\UpdateDataController@index');

Route::get('/createpetition', 'Student\PetitionController@index')->name('createpetition');
Route::get('/status', 'Student\StatusController@index')->name('status');

//แสดงหน้าแก้ไขคำร้อง
Route::get('/form01/edit/{id}', 'Student\StatusController@editview');
Route::get('/form02/edit/{id}', 'Student\StatusController@editview2');
Route::get('/form03/edit/{id}', 'Student\StatusController@editview3');
Route::get('/form04/edit/{id}', 'Student\StatusController@editview4');
Route::get('/form05/edit/{id}', 'Student\StatusController@editview5');
Route::get('/form06/edit/{id}', 'Student\StatusController@editview6');
Route::get('/form07/edit/{id}', 'Student\StatusController@editview7');
Route::get('/form08/edit/{id}', 'Student\StatusController@editview8');

Route::post('/form01/editpetition/{id}', 'Student\StatusController@edit01');
Route::post('/form02/editpetition/{id}', 'Student\StatusController@edit02');
Route::post('/form03/editpetition/{id}', 'Student\StatusController@edit03');
Route::post('/form04/editpetition/{id}', 'Student\StatusController@edit04');
Route::post('/form05/editpetition/{id}', 'Student\StatusController@edit05');
Route::post('/form06/editpetition/{id}', 'Student\StatusController@edit06');
Route::post('/form07/editpetition/{id}', 'Student\StatusController@edit07');
Route::post('/form08/editpetition/{id}', 'Student\StatusController@edit08');



Route::get('/statusdata', 'Student\StatusController@statusdata');


Route::get('/createpetition/petition01', 'Student\PetitionController@petition01')->name('petition01');
Route::get('/createpetition/petition02', 'Student\Petition02Controller@petition02')->name('petition02');
Route::get('/createpetition/petition03', 'Student\Petition03Controller@petition03')->name('petition03');
Route::get('/createpetition/petition04', 'Student\Petition04Controller@petition04');
Route::get('/createpetition/petition05', 'Student\Petition05Controller@petition05')->name('petition05');
Route::get('/createpetition/petition06', 'Student\Petition06Controller@petition06')->name('petition06');
Route::get('/createpetition/petition07', 'Student\Petition07Controller@petition07')->name('petition07');
Route::get('/createpetition/petition08', 'Student\Petition08Controller@petition08')->name('petition08');

Route::post('/createpetition/petition01', 'Student\PetitionController@store')->name('create01');
Route::post('/createpetition/petition02', 'Student\Petition02Controller@store')->name('create02');
Route::post('/createpetition/petition03', 'Student\Petition03Controller@store')->name('create03');
Route::post('/createpetition/petition04', 'Student\Petition04Controller@store')->name('create04');
Route::post('/createpetition/petition05', 'Student\Petition05Controller@store')->name('create05');
Route::post('/createpetition/petition06', 'Student\Petition06Controller@store')->name('create06');
Route::post('/createpetition/petition07', 'Student\Petition07Controller@store')->name('create07');
Route::post('/createpetition/petition08', 'Student\Petition08Controller@store')->name('create08');

Route::get('/downloadpdf/{id}', 'Student\PetitionController@downloadPDF');
Route::get('/downloadpdf2/{id}', 'Student\Petition02Controller@downloadPDF');
Route::get('/downloadpdf3/{id}', 'Student\Petition03Controller@downloadPDF');
Route::get('/downloadpdf4/{id}', 'Student\Petition04Controller@downloadPDF');
Route::get('/downloadpdf5/{id}', 'Student\Petition05Controller@downloadPDF');
Route::get('/downloadpdf6/{id}', 'Student\Petition06Controller@downloadPDF');
Route::get('/downloadpdf7/{id}', 'Student\Petition07Controller@downloadPDF');
Route::get('/downloadpdf8/{id}', 'Student\Petition08Controller@downloadPDF');

Route::get('/downloadpdf2', 'Student\PetitionController@downloadPDF2');

Route::get('/form01/{id}', 'Student\PetitionController@show');
Route::get('/form02/{id}', 'Student\Petition02Controller@show');
Route::get('/form03/{id}', 'Student\Petition03Controller@show');
Route::get('/form04/{id}', 'Student\Petition04Controller@show');
Route::get('/form05/{id}', 'Student\Petition05Controller@show');
Route::get('/form06/{id}', 'Student\Petition06Controller@show');
Route::get('/form07/{id}', 'Student\Petition07Controller@show');
Route::get('/form08/{id}', 'Student\Petition08Controller@show');
//ไม่อนุมัติ 01
Route::get('/form01/noapprove/{id}', 'Teacher\HistoryController@viewnoapprove');
Route::post('/form01/noapprove/Advice/{id}', 'Teacher\HistoryController@teachernoapprove');
Route::get('/form01/noapprove2/{id}', 'Headteacher\HistoryController@viewnoapprove');
Route::post('/form01/noapprove2/Advice/{id}', 'Headteacher\HistoryController@headteachernoapprove');
Route::get('/form01/noapprove3/{id}', 'Dean\HistoryController@viewnoapprove');
Route::post('/form01/noapprove3/Advice/{id}', 'Dean\HistoryController@deannoapprove');
//ไม่อนุมัติ 02
Route::get('/form02/noapprove4/{id}', 'Register\HistoryController@viewnoapprove02');
Route::post('/form02/noapprove4/Advice/{id}', 'Register\HistoryController@registernoapprove02');
//ไม่อนุมัติ 03
Route::get('/form03/noapprove4/{id}', 'Register\HistoryController@viewnoapprove03');
Route::post('/form03/noapprove4/Advice/{id}', 'Register\HistoryController@registernoapprove03');
//ไม่อนุมัติ 04
Route::get('/form04/noapprove4/{id}', 'Register\HistoryController@viewnoapprove04');
Route::post('/form04/noapprove4/Advice/{id}', 'Register\HistoryController@registernoapprove04');
//ไม่อนุมัติ 05
Route::get('/form05/noapprove/{id}', 'Teacher\HistoryController@viewnoapprove05');
Route::post('/form05/noapprove/Advice/{id}', 'Teacher\HistoryController@teachernoapprove05');
Route::get('/form05/noapprove2/{id}', 'Headteacher\HistoryController@viewnoapprove05');
Route::post('/form05/noapprove2/Advice/{id}', 'Headteacher\HistoryController@headteachernoapprove05');
Route::get('/form05/noapprove3/{id}', 'Dean\HistoryController@viewnoapprove05');
Route::post('/form05/noapprove3/Advice/{id}', 'Dean\HistoryController@deannoapprove05');
//ไม่อนุมัติ 06
Route::get('/form06/noapprove/{id}', 'Teacher\HistoryController@viewnoapprove06');
Route::post('/form06/noapprove/Advice/{id}', 'Teacher\HistoryController@teachernoapprove06');
Route::get('/form06/noapprove2/{id}', 'Headteacher\HistoryController@viewnoapprove06');
Route::post('/form06/noapprove2/Advice/{id}', 'Headteacher\HistoryController@headteachernoapprove06');
Route::get('/form06/noapprove3/{id}', 'Dean\HistoryController@viewnoapprove06');
Route::post('/form06/noapprove3/Advice/{id}', 'Dean\HistoryController@deannoapprove06');
//ไม่อนุมัติ 07
Route::get('/form07/noapprove/{id}', 'Teacher\HistoryController@viewnoapprove07');
Route::post('/form07/noapprove/Advice/{id}', 'Teacher\HistoryController@teachernoapprove07');
Route::get('/form07/noapprove2/{id}', 'Headteacher\HistoryController@viewnoapprove07');
Route::post('/form07/noapprove2/Advice/{id}', 'Headteacher\HistoryController@headteachernoapprove07');
Route::get('/form07/noapprove3/{id}', 'Dean\HistoryController@viewnoapprove07');
Route::post('/form07/noapprove3/Advice/{id}', 'Dean\HistoryController@deannoapprove07');
//ไม่อนุมัติ 08
Route::get('/form08/noapprove/{id}', 'Teacher\HistoryController@viewnoapprove08');
Route::post('/form08/noapprove/Advice/{id}', 'Teacher\HistoryController@teachernoapprove08');
Route::get('/form08/noapprove2/{id}', 'Headteacher\HistoryController@viewnoapprove08');
Route::post('/form08/noapprove2/Advice/{id}', 'Headteacher\HistoryController@headteachernoapprove08');
Route::get('/form08/noapprove3/{id}', 'Dean\HistoryController@viewnoapprove08');
Route::post('/form08/noapprove3/Advice/{id}', 'Dean\HistoryController@deannoapprove08');

//การอนุมัติ form01
Route::get('/indexapprove/{id}', 'Teacher\HistoryController@indexapprove');
Route::post('/form01update/{id}', 'Student\PetitionController@teacherapprove');
Route::get('/indexapprove2/{id}', 'Headteacher\HistoryController@indexapprove');
Route::post('/form01update2/{id}', 'Student\PetitionController@headteacherapprove');
Route::get('/indexapprove3/{id}', 'Dean\HistoryController@indexapprove');
Route::post('/form01update3/{id}', 'Student\PetitionController@deanapprove');
//การอนุมัติ form02
Route::get('/indexapprove4/{id}', 'Register\HistoryController@indexapprove02');
Route::post('/form02update4/{id}', 'Student\Petition02Controller@registerapprove');
//การอนุมัติ form03
Route::get('/index03approve4/{id}', 'Register\HistoryController@indexapprove03');
Route::post('/form03update4/{id}', 'Student\Petition03Controller@registerapprove');
//การอนุมัติ form04
Route::get('/index044approve4/{id}', 'Register\HistoryController@indexapprove04');
Route::get('/form04update4/{id}', 'Student\Petition04Controller@registerapprove');
Route::post('/form04update4card/{id}', 'Student\Petition04Controller@registerapprovecard');
//การอนุมัติ form05
Route::get('/form05update/{id}', 'Student\Petition05Controller@teacherapprove');
Route::get('/form05update2/{id}', 'Student\Petition05Controller@headteacherapprove');
Route::get('/form05update3/{id}', 'Student\Petition05Controller@deanapprove');
//การอนุมัติ form06
Route::get('/index06approve/{id}', 'Teacher\HistoryController@index06approve');
Route::post('/form06update/{id}', 'Student\Petition06Controller@teacherapprove');
Route::get('/form06update2/{id}', 'Student\Petition06Controller@headteacherapprove');
Route::get('/form06update3/{id}', 'Student\Petition06Controller@deanapprove');
//การอนุมัติ form07
Route::get('/index07approve/{id}', 'Teacher\HistoryController@index07approve');
Route::post('/form07update/{id}', 'Student\Petition07Controller@teacherapprove');
Route::get('/form07update2/{id}', 'Student\Petition07Controller@headteacherapprove');
Route::get('/form07update3/{id}', 'Student\Petition07Controller@deanapprove');
//การอนุมัติ form08
Route::get('/index08approve/{id}', 'Teacher\HistoryController@index08approve');
Route::post('/form08update/{id}', 'Student\Petition08Controller@teacherapprove');
Route::get('/index08approve2/{id}', 'Headteacher\HistoryController@index08approve');
Route::post('/form08update2/{id}', 'Student\Petition08Controller@headteacherapprove');
Route::get('/index08approve3/{id}', 'Dean\HistoryController@index08approve');
Route::post('/form08update3/{id}', 'Student\Petition08Controller@deanapprove');

Route::get('/form01/delete/{id}', 'Student\PetitionController@destroy');
Route::get('/form02/delete/{id}', 'Student\Petition02Controller@destroy');
Route::get('/form03/delete/{id}', 'Student\Petition03Controller@destroy');
Route::get('/form04/delete/{id}', 'Student\Petition04Controller@destroy');
Route::get('/form05/delete/{id}', 'Student\Petition05Controller@destroy');
Route::get('/form06/delete/{id}', 'Student\Petition06Controller@destroy');
Route::get('/form07/delete/{id}', 'Student\Petition07Controller@destroy');
Route::get('/form08/delete/{id}', 'Student\Petition08Controller@destroy');

Route::get('/histroypetition', 'Teacher\HistoryController@index')->name('histroypetition');
Route::get('/histroypetition2', 'Headteacher\HistoryController@index')->name('histroypetition2');
Route::get('/histroypetition3', 'Dean\HistoryController@index')->name('histroypetition3');
Route::get('/histroypetition4', 'Register\HistoryController@index')->name('histroypetition4');



Route::get('/studentcsv', 'Admin\PagesController@index')->name('importcsv');
Route::post('/uploadFile', 'Admin\PagesController@uploadFile');
Route::get('/teachercsv', 'Admin\PagesController@index2')->name('importcsv2');
Route::post('/uploadFile2', 'Admin\PagesController@uploadFile2');

Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');

Route::get('/flie/download/{id}', 'Student\Petition03Controller@download')->name('download_img03');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){

    Route::resource('/users','UserController', ['except' => ['show','create','store']]);

});

Route::get('/createpetition/petition04', function () {
    $usermail = Auth::user()->email;
    $userid = Auth::user()->id;
    $user = Studentcsv::where('Mail' , $usermail)->get();
    return view("student/petition04")->with('users', $user)->with('usersid', $userid);
})->name('petition04');
