<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PrintController extends Controller
{
    public function getPDF(){
        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->where('request_bachlor_id',9)
            ->get();

        return view('delivred',compact('requests'));
    }

    public function printPDF(){

        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->where('request_bachlor_id',$id)
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('delivred',compact('requests'),[],'UTF-8')
            ->setPaper('a4','landscape');

        return $pdf->download('request-veterinary.pdf');
//
//            $pdf = PDF::loadView('delivred',compact('requests'));
//            return $pdf->download('Licence.pdf');


//            $request = $requests->first();
//            $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', true);
//


//            $html = '
//            <h1>hello<h1>
//            ';
//
//// output the HTML content
////            $pdf->writeHTML($html, true, 0, true, 0);
//          //  $view = \View::make('delivred',compact('requests'));
//        //    $html = $view->render();
//            $pdf->SetFont('aealarabiya','', 18);
//            $pdf->SetTitle('Hello World');
//            $pdf->Text(0,0,$request->bachlor_student_last_name_ar);
//            $pdf->AddPage();
//           $pdf->WriteHTML($html, '', 0, 'L', true, 0);
//            $pdf->Output('Licence.pdf');
//


//
//            $domPdfPath = base_path( 'vendor/dompdf/dompdf');
//            Settings::setPdfRendererPath($domPdfPath);
//            Settings::setPdfRendererName('DomPDF');
//
//            $request = $requests->first();
//
//
//
//            $file = "licence.docx";
//            $tmpFile = "licence-output.pdf";
//            $outfile = "licence-output.docx";
//
//            $template = new TemplateProcessor($file);
//            $template->setValue('LAST_NAME',$request->bachlor_student_last_name_ar);
//            $template->setValue('FIRST_NAME',$request->bachlor_student_first_name_ar);
//
//            $template->setValue('BIRTHDAY',$request->bachlor_student_birthday);
//            $template->setValue('DOMAIN',$request->domain_code);
//            $template->setValue('FILLIERE',$request->division_code);
//            $template->setValue('SPECIALITY',$request->speciality_code);
//
//            $template->saveAs($outfile);
//
//            $phpWord = IOFactory::load($outfile);
//            $phpWord->save($tmpFile,'PDF');
//
//            return  response()->download($outfile);


    }
}
