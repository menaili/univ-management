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




}
