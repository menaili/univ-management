<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{


    public function index($name = null){
        return view('admin.depertement.add-faculty');
    }

    public function addFaculty(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('faculty')->insert([

            'faculty_code' => $request->faculty_name,
            'faculty_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('faculty_added', 'faculty has been added successfully!');
    }












//-----------------------DOMAIN----------------------------

    public function domain($name = null){
        return view('admin.depertement.add-domain');
    }

    public function addDomain(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('domain')->insert([

            'domain_code' => $request->domain_name,
            'faculty_id' => $request->faculty,
            'domain_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('domain_added', 'domain has been added successfully!');
    }



    public function getFacultyOfDomain(){
        $faculties = DB::table('faculty')->get();

        return View('admin.depertement.add-domain')->with(compact('faculties'));

    }








//------------------------------DEVISION-------------------------------------------

    public function devision($name = null){
        return view('admin.depertement.add-devision');
    }

    public function addDevision(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('division')->insert([
            'domain_id' => $request->domain,
            'division_code' => $request->devision_name,
            'division_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('devision_added', 'devision has been added successfully!');
    }


    public function getFacultyOfDevision(){
        $faculties = DB::table('faculty')->get();
        return View('admin.depertement.add-devision')->with(compact('faculties'));

    }

    public function getDomainOfDevision($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }











//------------------------------SPECIALITY-------------------------------------------

    public function speciality($name = null){
        return view('admin.depertement.add-speciality');
    }

    public function addSpeciality(Request $request){
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('speciality')->insert([
            'division_id' => $request->devision,
            'speciality_code' => $request->speciality_name,
            'speciality_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('speciality_added', 'speciality has been added successfully!');
    }

    public function getFacultyOfSpeciality(){
        $faculties = DB::table('faculty')->get();
        return View('admin.depertement.add-speciality')->with(compact('faculties'));

    }


    public function getDomainOfSpeciality($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfSpeciality($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }










}




