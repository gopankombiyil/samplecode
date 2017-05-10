@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        <h4>Details of Training Programme</h4>
        <hr>
        <div class="row">
          <div class="col-lg-6"><strong>Center: {{ $registration->center->name }}</strong></div>  
          <div class="col-lg-6 text-right"><strong>Duration: {{$registration->from_dt}} to {{$registration->to_dt}}</strong></div>  
        </div>
        <div class="row"><div class="col-lg-6"><h4>RPs</h4></div></div>
        <div class="row"><div class="col-lg-12">
            
                @foreach($registration->rps as $rp)
                    
                    <div class="col-md-3">{{$rp->name}}</div>
                    <div class="col-md-3">{{$rp->school->name}}</div>
                    <div class="col-md-3">{{$rp->type->name}}</div>
                    <div class="col-md-3">{{$rp->subject->name}}</div>
                @endforeach
                
        </div></div>
        <hr>
        <div class="row"><div class="col-lg-6"><h4>Participants</h4></div></div>
        <div class="row"><div class="col-lg-12">
                <div class="row">
                @foreach($registration->participant as $par)
                    <div class="col-md-3">{{$par->name}}</div>
                    <div class="col-md-3">{{$par->school->name}}</div>
                    <div class="col-md-3">{{$par->type->name}}</div>
                    <div class="col-md-3">{{$par->subject->name}}</div>
                @endforeach
                </div>
        </div></div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('users.registrations.index') }}" class="btn btn-info">Back</a>
            </div>    
            <div class="col-md-6 text-right">
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['users.registrations.destroy', $registration->id]
                ]) !!}
                {!! Form::submit('Cancel Registration', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>    
    </div>
</section>
@stop