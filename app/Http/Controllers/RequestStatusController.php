<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RequestStatusController extends Controller
{

//------------VETERENARY---------------------------------------------------------


    public function getAllRequestsStatusVeterinary(){
        $requests = DB::table('request_veterinary')->get();

//        $faculty = DB::table('faculty')
//            ->join('requests','faculty.faculty_id','=','request_veterinary.faculty_id')
//            ->select('faculty.faculty_code')
//            ->get();



        return view('admin.status.veterinary',compact('requests'));
    }


    public function changeStatusVeterinary($id){

        $req = DB::table('request_veterinary')->where('request_veterinary_id',$id)->first();

        if ($req->veterinary_status == 'Demandé'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->veterinary_status == 'Consulté'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Signature doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->veterinary_status == 'Signature doyen'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Signature directeur',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->veterinary_status == 'Signature directeur'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Enregistrement',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->veterinary_status == 'Enregistrement'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Validé',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->veterinary_status == 'Validé'){

            $requests_veterinary = DB::table('request_bachlor')

                ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
                ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
                ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
                ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

                ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
                ->where('request_bachlor_id',$id)
                ->get();
            $pdf = PDF::loadView('admin.request-view.delivred-veterinary',compact('requests_veterinary'));

            return $pdf->download('request-veterinary.pdf');

        }


    }


//-------------------BACHLOR-----------------------------------------------------------



    public function getAllRequestsStatusBachlor(){
        $requests = DB::table('request_bachlor')->get();

//        $faculty = DB::table('faculty')
//            ->join('requests','faculty.faculty_id','=','request_veterinary.faculty_id')
//            ->select('faculty.faculty_code')
//            ->get();



        return view('admin.status.bachlor',compact('requests'));
    }


    public function changeStatusBachlor($id){

        $req = DB::table('request_bachlor')->where('request_bachlor_id',$id)->first();

        if ($req->bachlor_status == 'Demandé'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->bachlor_status == 'Consulté'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Signature doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->bachlor_status == 'Signature doyen'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Signature directeur',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->bachlor_status == 'Signature directeur'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Enregistrement',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->bachlor_status == 'Enregistrement'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Validé',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->bachlor_status == 'Validé'){

            $requests = DB::table('request_bachlor')

                ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
                ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
                ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
                ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

                ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
                ->where('request_bachlor_id',$id)
                ->get();

            $pdf = PDF::loadView('admin.request-view.delivred',compact('requests'))->setPaper('a4', 'landscape');

            return $pdf->download('request-bachlor.pdf');

        }


    }






//-------------------MASTER-----------------------------------------------------------


    public function getAllRequestsStatusMaster(){
        $requests = DB::table('request_master')->get();

//        $faculty = DB::table('faculty')
//            ->join('requests','faculty.faculty_id','=','request_veterinary.faculty_id')
//            ->select('faculty.faculty_code')
//            ->get();



        return view('admin.status.master',compact('requests'));
    }


    public function changeStatusMaster($id){

        $req = DB::table('request_master')->where('request_master_id',$id)->first();

        if ($req->master_status == 'Demandé'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'matser_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->master_status == 'Consulté'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Signature doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->master_status == 'Signature doyen'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Signature directeur',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->master_status == 'Signature directeur'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Enregistrement',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        if ($req->master_status == 'Enregistrement'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Validé',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->master_status == 'Validé'){

            $requests_master = DB::table('request_master')->where('request_master_id',$id)->get();
            $pdf = PDF::loadView('admin.request-view.delivred-master',compact('requests_master'));

            return $pdf->download('request-master.pdf');

        }

    }







}
