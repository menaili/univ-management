<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class SendRequestController extends Controller
{
    public function index($name = null){
        return view('pages.send-request');
    }

    // public function getAlllevel(){
    //     $level = DB::table('level')->get();
    //     return view('pages.send-request',compact('level'));
    // }

    public function addRequest(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('requests')->insert([

            'requests_student_first_name' => $request->firstname,
            'requests_student_second_name' => $request->lastname,
            'requests_student_birthday' => $request->dateOfBirth,
            'diploma_N' => $request->diplomanumber,
            'diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'level_id' => $request->level,
            'request_sp' => $request->speciality,
            'request_note' => $request->note,
            'request_date' => Carbon::now()->toDateTimeString(),


        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }



    public function getById($id){

        $requests = DB::table('requests')->where('requests_id',$id)->first();
        return view('admin.edit-request',compact('requests'));


    }


    public function updateById($request){


        date_default_timezone_set('Africa/Algiers');
        DB::table('requests')->where('requests_id',$request->id)->update([
            'requests_student_first_name' => $request->firstnameedit,
            'requests_student_second_name' => $request->lastnameedit,
            'requests_student_birthday' => $request->dateOfBirthedit,
            'diploma_N' => $request->diplomanumberedit,
            'diploma_date' => $request->dateOfDiplomaedit,


//            'faculty_id' => $request->faculty,
//            'level_id' => $request->level,


            'request_sp' => $request->specialityedit,
            'request_note' => $request->noteedit,
            'request_date' => Carbon::now()->toDateTimeString(),
            ]);
        return back()->with('request_updated', 'request updated successfully!');


    }


    public function getLevelFaculty(){
        $faculties = DB::table('faculty')->get();
        $levels = DB::table('level')->get();
        return View('admin.send-request')->with(compact('faculties','levels'));

    }





}
