<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PrintController extends Controller
{
    public function getPDF(){
//        ->where('request_bachlor_id',7)->get();
        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->where('request_bachlor_id',7)
            ->get();

        return view('admin.request-view.delivred',compact('requests'));
    }

//    public function printPDF(){
//
//        $requests = DB::table('request_bachlor')->where('request_bachlor_id',4)->get();
//        $pdf = PDF::loadView('admin.request-view.delivred',compact('requests'));
//
//        return $pdf->download('request.pdf');
//
//
//    }
}
