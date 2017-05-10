<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\Http\Requests;
use App\School;

class SchoolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
   
     public function index()
    {
        $schools = School::orderBy('edu_district')->orderBy('sub_district')->orderBy('name')->paginate(20);
        return view('dashboard.schools.index')->withSchools($schools);
    }


    public function create()
    {
        return view('dashboard.schools.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        School::create($input);
        return Redirect::route('users.schools.index')->with('message', 'School Added');
    }
    

    public function show($id)
    {
        $school = School::findOrFail($id);
        return view('dashboard.schools.show')->withSchool($school);
    }

   
    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('dashboard.schools.edit')->withSchool($school);;
    }

    
    public function update($id, Request $request)
    {
        $school = School::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $school->fill($input)->save();
        return redirect::route('users.schools.index')->with('message','School Updated Successfully');
    }

    
    public function destroy($id)
    {
         $school = School::findOrFail($id);
         $school->delete();
         return redirect::route('users.schools.index')->with('message','School Removed Successfully.');
    }
}
