<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormEngine;
use Auth;
use DB;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    // protected $property;

    public function __construct()
    {
        // $this->property = $property;

        $counter = DB::table('users')->where('uuid', '')
            ->orWhere('uuid', null)->count();

        if ($counter > 0) {

            $uuid = DB::table('users')->where('uuid', '')
                ->orWhere('uuid', null)->get();

            foreach ($uuid as $data) {

                DB::table('users')->where('id', $data->id)->update([

                    'uuid' => md5($data->email . uniqid()),

                ]);
            }

        }

    }

    public function PassengerRegistrationWizard()
    {
        $FormEngine = new FormEngine();

        $rem = ['created_at', 'uuid', 'updated_at', 'id', 'PID', 'status', 'Email', 'FullName'];

        $data = [
            'Page'  => 'Passenger.PassengerDetails',
            'Title' => Auth::user()->name . "'s Account",
            'Desc'  => 'Property Irregularity Report',
            'rem'   => $rem,

            'Form'  => $FormEngine->Form('passengers'),
        ];

        return view('scrn', $data);
    }

    public function PaasengerGoToStepTwo()
    {

        return redirect()
            ->route('PIR_Step_Two')
            ->with('status', 'Passenger Information saved successfully');

    }

    public function PIR_Step_Two()
    {
        $FormEngine = new FormEngine();

        $Details = DB::table('passenger_laguage_details')
            ->where('PID', Auth::user()->uuid)
            ->where('ComplaintStatus', 'Pending')
            ->get();

        $rem = ['created_at', 'uuid',
            'updated_at', 'id', 'PID', 'status',
            'Email',
            'FullName',
            'ComplaintID',
            'ComplaintStatus',
        ];

        $data = [
            'Page'    => 'Passenger.PIR_Step_Two',
            'Title'   => Auth::user()->name . "'s Account",
            'Desc'    => 'Property Irregularity Report | Laguage Details',
            'rem'     => $rem,
            // 'step2' => "step2",
            'Details' => $Details,
            'Form'    => $FormEngine->Form('passenger_laguage_details'),
        ];

        return view('scrn', $data);
    }

    public function SavePassengerData(Request $request)
    {

        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        return redirect()
            ->route('PaasengerGoToStepTwo')
            ->with('status', 'Passenger Information saved successfully');
    }

    public function PIR_Step_Three()
    {

        $counter = DB::table('passenger_laguage_details')
            ->where('PID', Auth::user()->uuid)
            ->where('ComplaintStatus', 'Pending')
            ->count();

        if ($counter < 1) {

            return redirect()
                ->back()
                ->with('error_a', 'Baggage Information missing. Please fill your your baggage details and try again.');

        }

        $Details = DB::table('passenger_travel_details')
            ->where('PID', Auth::user()->uuid)
            ->get();

        $FormEngine = new FormEngine();

        $rem = ['created_at', 'uuid', 'updated_at', 'id', 'PID', 'status', 'Email', 'FullName'];

        $data = [
            'Page'  => 'Passenger.PIR_Step_Three',
            'Title' => Auth::user()->name . "'s Account",
            'Desc'  => 'Final Step | Property Irregularity Report',
            'rem'   => $rem,

            'Form'  => $FormEngine->Form('passenger_travel_details'),
        ];

        return view('scrn', $data);
    }

    public function SaveTravelData(Request $request)
    {

        $validated = $request->validate([
            '*'     => 'required',
            'files' => 'nullable',
        ]);

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        DB::table("passenger_steps")->insert(
            [
                "uuid"  => md5(Auth::user()->uuid . uniqid()),
                "PID"   => Auth::user()->PID,
                "token" => date('Ymd'),
                "Step"  => '3',
            ]
        );

        return redirect()
            ->route('PaasengerGoToStepTwo')
            ->with('status', 'Passenger Information saved successfully');
    }

    public function PIRPassengerDashboard()
    {
        // $TrackingReport = DB::table("passenger_steps AS S")
        // ->join('passenger_travel_details AS T', 'T.PID', 'S.PID')
        // ->join('passenger_laguage_details AS L', 'L.PID', 'S.PID')
        // ->join('passengers AS P', 'P.PID', 'S.PID')
        // ->select('S.id AS S_id', 'T.id AS T_id', 'L.id AS L_id', 'P.id AS P_id'
        //     'S.*', 'P.*', 'T.*', 'L.*')
        //     ->json();

    }

}