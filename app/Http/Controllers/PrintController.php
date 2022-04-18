<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PrintController extends Controller
{
    public function getPDF(){

        $requests = DB::table('request_bachlor')->where('request_bachlor_id',4)->get();


        return view('admin.request-view.delivred',compact('requests'));
    }

    public function printPDF(){

        $requests = DB::table('request_bachlor')->where('request_bachlor_id',4)->get();
        $pdf = PDF::loadView('admin.request-view.delivred',compact('requests'));

        return $pdf->download('request.pdf');


    }
}
