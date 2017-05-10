<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Registration;
use App\Attendance;
use App\Rpattendance;
use Carbon\Carbon;

class AttendancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::orderBy('created_at','desc')->paginate(10);
        $regusers = Registration::orderBy('created_at','desc')->where('user_id','=',Auth::user()->id)->paginate(10);
        return view('dashboard.attendances.index')->withRegistrations($registrations)->withRegusers($regusers);
    }
    
     public function showb($id,$session)
    {
        $session = strtoupper($session);
        $registration = Registration::findOrFail($id);
        $checkdate = Carbon::now()->format('Y-m-d');
        $attendances = Attendance::with('participant')->where('event_date','=',$checkdate)->where('session','=',$session)->get();
        if($registration->from_dt <= Carbon::now()->format('d-m-Y') && $registration->to_dt >= Carbon::now()->format('d-m-Y')){
            $show = 1;
        }else{
            $show = 0;
        }
        if ($registration->rp == $registration->rps->count() && $registration->participants == $registration->participant->count()){
            return view('dashboard.attendances.show')->withRegistration($registration)->withSession($session)->withAttendances($attendances)->withShow($show);
        }else{
            
            return Redirect::route('users.attendances.index')->with('message', 'Please add all the participants and RPs first');
    
        }
            
            
         
        
    }
    
    public function store(Request $request)
    {
        $session = $request->input('session');
        $input = $request->all();
        
        foreach($input['present'] as $index => $value) {
           $atta = new Attendance;
           $atta->participant_id = $input['participant_id'][$index];
           $atta->event_date = Carbon::now()->format('Y-m-d');
           $atta->session = $session;
           $atta->present = $input['present'][$index];
           $atta->save();
        }
        
        foreach($input['rp_present'] as $index => $value) {
           $atta = new Rpattendance;
           $atta->rp_id = $input['rp_id'][$index];
           $atta->event_date = Carbon::now()->format('Y-m-d');
           $atta->session = $session;
           $atta->present = $input['rp_present'][$index];
           $atta->save();
        }
        
        return Redirect::route('users.attendances.index')->with('message', 'Attendence Added');
    }
    

}
