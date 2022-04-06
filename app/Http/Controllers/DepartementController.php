<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    public function getFacultyOfDomain(){
        $faculties = DB::table('faculty')->get();

        return View('admin.depertement.add-domain')->with(compact('faculties'));

    }



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



}
