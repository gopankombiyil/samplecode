<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use App\Http\Requests;
use App\Ticker;

class TickersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
   
     public function index()
    {
        $tickers = Ticker::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.tickers.index')->withTickers($tickers);
    }


    public function create()
    {
        return view('dashboard.tickers.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'newsitem' => 'required',
        ]);
        $input = $request->all();
        Ticker::create($input);
        return Redirect::route('users.tickers.index')->with('message', 'News Item Added');
    }
    

    public function show($id)
    {
        $ticker = Ticker::findOrFail($id);
        return view('dashboard.tickers.show')->withTicker($ticker);
    }

   
    public function edit($id)
    {
        $ticker = Ticker::findOrFail($id);
        return view('dashboard.tickers.edit')->withTicker($ticker);;
    }

    
    public function update($id, Request $request)
    {
        $ticker = Ticker::findOrFail($id);

        $this->validate($request, [
            'newsitem' => 'required',
        ]);
        $input = $request->all();
        $ticker->fill($input)->save();
        return redirect::route('users.tickers.index')->with('message','News Updated Successfully');
    }

    
    public function destroy($id)
    {
         $ticker = Ticker::findOrFail($id);
         $ticker->delete();
         return redirect::route('users.tickers.index')->with('message','News Removed Successfully.');
    }
}
