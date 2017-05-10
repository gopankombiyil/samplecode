<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\Http\Requests;
use App\Programme;

class ProgrammesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
   
     public function index()
    {
        $programmes = Programme::all();
        return view('dashboard.programmes.index')->withProgrammes($programmes);
    }


    public function create()
    {
        return view('dashboard.programmes.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        Programme::create($input);
        return Redirect::route('users.programmes.index')->with('message', 'Training Programme Added');
    }
    

    public function show($id)
    {
        $programme = Programme::findOrFail($id);
        return view('dashboard.programmes.show')->withProgramme($programme);
    }

   
    public function edit($id)
    {
        $programme = Programme::findOrFail($id);
        return view('dashboard.programmes.edit')->withProgramme($programme);;
    }

    
    public function update($id, Request $request)
    {
        $programme = Programme::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $programme->fill($input)->save();
        return redirect::route('users.programmes.index')->with('message','Training Programme Updated Successfully');
    }

    
    public function destroy($id)
    {
         $programme = Programme::findOrFail($id);
         $programme->delete();
         return redirect::route('users.programmes.index')->with('message','Training Programme Removed Successfully.');
    }
}
