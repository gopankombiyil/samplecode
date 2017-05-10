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
        <div class="col-lg-12"><h2>Record Attendance</h2></div>
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
            <div class="col-md-3">
                <a href="/users/attendances/{{$registration->id}}/day/fn" class="btn btn-xs btn-warning">FN</a>
                <a href="/users/attendances/{{$registration->id}}/day/an" class="btn btn-xs btn-info">AN</a>
                
            </div>
            
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">{!! $registrations->render() !!}</div>    
        </div>
    @else
        <div class="row">
            <div class="col-md-3"><strong>Name of Center</strong></div>
            <div class="col-md-2"><strong>Training Programme</strong></div>
                <div class="col-md-3"><strong>Duration</strong></div>
        </div>
        @foreach($regusers as $registration)
        
        <div class="row">
             <div class="col-md-3"><a href="{{ route('users.attendances.show',$registration->id) }}"><strong>{{$registration->center->name}}</strong></a></div>
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