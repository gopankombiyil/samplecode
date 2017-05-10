<?php

namespace App\Http\Controllers;
use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Rp;
use App\Type;
use App\Registration;
use App\School;
use App\Subject;
use App\Http\Requests;

class RpsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $registration = Registration::findOrFail($id);
        
        if($registration->rp == $registration->rps->count()){
            return redirect('users/registrations')->with('message', 'You have already entered RPs');
        }else{
            $scha = School::orderBy('name')->pluck('name','id')->all();
            $sch = array('' => 'Select School of Participant') + $scha;
            $typa = Type::pluck('name','id')->all();
            $typ = array('' => 'Select one type') + $typa;
            $suba = Subject::orderBy('name')->pluck('name','id')->all();
            $sub = array('' => 'Select one subject') + $suba;

            return view('dashboard.rps.create')->withId($id)->withTyp($typ)->withSub($sub)->withSch($sch);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        Rp::create($input);
        return Redirect::route('users.registrations.index')->with('message', 'RP Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
