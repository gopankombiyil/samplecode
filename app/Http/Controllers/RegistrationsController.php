<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Registration;
use App\Programme;
use App\Center;
class RegistrationsController extends Controller
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
        return view('dashboard.registrations.index')->withRegistrations($registrations)->withRegusers($regusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        
    {
        $prg = Programme::pluck('name','id')->all();
        $cen = Center::pluck('name','id')->all();
        return view('dashboard.registrations.create')->withPrg($prg)->withCen($cen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->all();
        Registration::create($input);
        return Redirect::route('users.registrations.index')->with('message', 'Registration Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('dashboard.registrations.show')->withRegistration($registration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
