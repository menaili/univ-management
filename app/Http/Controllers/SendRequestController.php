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
        DB::table('request_veterinary')->insert([

            'veterinary_student_first_name' => $request->firstname,
            'veterinary_student_last_name' => $request->lastname,
            'veterinary_student_birthday' => $request->dateOfBirth,
            'veterinary_diploma_number' => $request->diplomanumber,
            'veterinary_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'veterinary_note' => $request->note,
            'veterinary_status_date' => Carbon::now()->toDateTimeString(),


        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }



    public function getByIdVeterinary($id){

        $requests = DB::table('request_veterinary')->where('request_veterinary_id',$id)->first();
        return view('admin.edit-request',compact('requests'));

    }


    public function updateByIdVeterinary($request){



        date_default_timezone_set('Africa/Algiers');
        DB::table('requests')->where('requests_id',$request->id)->update([
            'veterinary_student_first_name' => $request->firstname,
            'veterinary_student_last_name' => $request->lastname,
            'veterinary_student_birthday' => $request->dateOfBirth,
            'veterinary_diploma_number' => $request->diplomanumber,
            'veterinary_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'veterinary_note' => $request->note,
            'veterinary_status_date' => Carbon::now()->toDateTimeString(),
            ]);
        return back()->with('request_updated', 'request updated successfully!');


    }


    public function getLevelFaculty(){
        $faculties = DB::table('faculty')->get();

        return View('admin.send-request')->with(compact('faculties'));

    }




//    ------------------------------------Licence---------------------------------------------------

    public function indexLicence($name = null){
        return view('admin.send-request-licence');
    }

    // public function getAlllevel(){
    //     $level = DB::table('level')->get();
    //     return view('pages.send-request',compact('level'));
    // }

    public function addRequestLicence(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('request_bachlor')->insert([

            'bachlor_student_first_name' => $request->firstname,
            'bachlor_student_last_name' => $request->lastname,
            'bachlor_student_birthday' => $request->dateOfBirth,
            'bachlor_diploma_number' => $request->diplomanumber,
            'bachlor_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'bachlor_domain' => $request->domain,
            'bachlor_division' => $request->devision,
            'bachlor_speciality' => $request->speciality,
            'bachlor_status_date' => Carbon::now()->toDateTimeString(),


        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }



    public function getByIdLicence($id){

        $requests = DB::table('request_bachlor')->where('request_bachlor_id',$id)->first();
        return view('admin.edit-request',compact('requests'));

    }


    public function updateByIdLicence($request){



        date_default_timezone_set('Africa/Algiers');
        DB::table('request_bachlor')->where('request_bachlor_id',$request->id)->update([
            'bachlor_student_first_name' => $request->firstname,
            'bachlor_student_last_name' => $request->lastname,
            'bachlor_student_birthday' => $request->dateOfBirth,
            'bachlor_diploma_number' => $request->diplomanumber,
            'bachlor_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'bachlor_domain' => $request->domain,
            'bachlor_division' => $request->devision,
            'bachlor_speciality' => $request->speciality,
            'bachlor_status_date' => Carbon::now()->toDateTimeString(),
        ]);
        return back()->with('request_updated', 'request updated successfully!');


    }


    public function getlicenceFaculty(){
        $faculties = DB::table('faculty')->get();

        return View('admin.send-request-licence')->with(compact('faculties'));

    }


    public function getDomainOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }

    public function getSpecialityOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('speciality')->where('speciality.division_id',$id)->get();

    }


//----edit-licence----


    public function getLevelFacultylicence(){
        $faculties = DB::table('faculty')->get();

        return View('admin.edit-request')->with(compact('faculties'));

    }





//----------------------MASTER-------------------------------------------

    public function indexMaster($name = null){
        return view('admin.send-request-master');
    }


    public function addRequestMaster(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('request_master')->insert([

            'master_student_first_name' => $request->firstname,
            'master_student_last_name' => $request->lastname,
            'master_student_birthday' => $request->dateOfBirth,
            'master_diploma_number' => $request->diplomanumber,
            'master_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'master_domain' => $request->domain,
            'master_division' => $request->devision,
            'master_speciality' => $request->speciality,
            'master_status_date' => Carbon::now()->toDateTimeString(),


        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }


    public function getMasterFaculty(){
        $faculties = DB::table('faculty')->get();

        return View('admin.send-request-master')->with(compact('faculties'));

    }


    public function getDomainOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }

    public function getSpecialityOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('speciality')->where('speciality.division_id',$id)->get();

    }

}
