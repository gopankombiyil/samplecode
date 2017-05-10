@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        
    @if(session('message'))
        <div class="flash alert-danger">
            <p> {{ session('message') }}</p>		
        </div>	
    @endif
        
    @if (Session::has('message'))
<div class="flash alert-info">
    <p>{{ Session::get('message') }}</p>		
</div>	
@endif    
    <div class="row">
        <div class="col-lg-12"><h2>Registered Training Programmes</h2></div>
    </div>    
    
    <br>    
    @hasrole('administrator')
        <div class="row">
            <div class="col-md-3"><strong>Name of Center</strong></div>
            <div class="col-md-2"><strong>Training Programme</strong></div>
            <div class="col-md-3"><strong>Duration</strong></div>
            
        </div>
        @foreach($registrations as $registration)
        <div class="row">
            <div class="col-md-3"><strong>{{$registration->center->name}}</strong></div>
            <div class="col-md-2">{{ $registration->programme->name }}</div>
            <div class="col-md-3">{{$registration->from_dt}} to {{$registration->to_dt}}</div>
            <div class="col-md-1 text-right"><a class="btn btn-info btn-xs" href="/users/attendances/{{$registration->id}}/day/fn">FN</a></div>
            <div class="col-md-1"><a class="btn btn-warning btn-xs" href="/users/attendances/{{$registration->id}}/day/an">AN</a></div>
            
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">{!! $registrations->render() !!}</div>    
        </div>
    @else
        @foreach($regusers as $registration)
        
        <div class="row">
             <div class="col-md-3"><strong>{{$registration->center->name}}</strong></div>
            <div class="col-md-2">{{$registration->programme->name}}</div>
            <div class="col-md-3">{{$registration->from_dt}} to {{$registration->to_dt}}</div>
            
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">{!! $regusers->render() !!}</div>    
        </div>
    @endhasrole    
    
        
    </div>
</section>
@stop