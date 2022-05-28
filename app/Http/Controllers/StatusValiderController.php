<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StatusValiderController extends Controller
{
    public function changeStatusValidate($id)
    {

        date_default_timezone_set('Africa/Algiers');
        DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->update([
            'bachlor_status_valider' => 'valider',
            'bachlor_valider_date' => Carbon::now()->toDateTimeString(),

        ]);

        return back()->with('status_valider', 'status est valider!');



    }

}
