<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Studentcsv;
use App\User;
use Datatables;
use Session;
use App\Page;
use App\Teacher;
use App\student;



class UpdateDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Datatables::of(Studentcsv::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Studentcsv::all();
        $users2 = Teacher::all();
        return view('student/update')->with('users', $users)->with('users2', $users2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'std_id' => 'required',
            'std_titlename' => 'required',
            'std_fname' => 'required',
            'std_lname' => 'required',
            'std_major' => 'required',
            'std_faculty' => 'required',
            'std_course' => 'required',
            'std_idteacher' => 'required',
            'std_status' => 'required',
            'std_mail' => 'required',
            
        ]);
        $profile = User::find(Auth::user()->id);
        
        $profile->IDstudent = $request->std_id;
        $profile->Titlename = $request->std_titlename;
        $profile->Fname = $request->std_fname;
        $profile->Lname = $request->std_lname;
        $profile->Major = $request->std_major;
        $profile->Faculty = $request->std_faculty;
        $profile->course = $request->std_course;
        $profile->teacher_id = $request->std_idteacher;
        $profile->Status = $request->std_status;
        $profile->Mail = $request->std_mail;
        $profile->save();
        return redirect()->action('Admin\ProfileController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addprofile($id)
    {
        $add = Studentcsv::find($id);
        return view('student/upprofile',['adds' => $add]);
    }
}
