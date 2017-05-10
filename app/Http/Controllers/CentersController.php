<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\Http\Requests;
use App\Center;
use Spatie\Permission\Models\Role;
use App\User;

class CentersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
   
     public function index()
    {
        $centers = Center::all();
        return view('dashboard.centers.index')->withCenters($centers);
    }


    public function create()
    {
        $usra = Role::where('name', 'rp')->first()->users()->pluck('name','id')->all();
        
        $usr = array('' => 'Select Incharge') + $usra;
        return view('dashboard.centers.create')->withUsr($usr);
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        Center::create($input);
        
        return Redirect::route('users.centers.index')->with('message', 'Training Center Added');
    }
    

    public function show($id)
    {
        $center = Center::findOrFail($id);
        return view('dashboard.centers.show')->withCenter($center);
    }

   
    public function edit($id)
    {
        $center = Center::findOrFail($id);
        $usra = Role::where('name', 'rp')->first()->users()->pluck('name','id')->all();
        $usr = array('' => 'Select Incharge') + $usra;
        return view('dashboard.centers.edit')->withCenter($center)->withUsr($usr);
    }

    
    public function update($id, Request $request)
    {
        $center = Center::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $center->fill($input)->save();
        return redirect('users.centers.index')->with(['message'=>'Training Center Updated Successfully']);
    }

    
    public function destroy($id)
    {
         $center = Center::findOrFail($id);
         $center->delete();
         return redirect::route('users.centers.index')->with('message','Training Center Removed Successfully.');
    }
}
