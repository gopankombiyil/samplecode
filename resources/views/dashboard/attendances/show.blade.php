@extends('home.master')

@section('content')
    @if($show == 1)
        
    <section id="content">
	<div class="container">
        <h3>Attendance for {{Carbon\Carbon::now()->timezone('Asia/Kolkata')->format('d-m-Y')}} {{$session}}</h3>
        <hr>
        <div class="row">
          <div class="col-lg-6"><strong>Center: {{ $registration->center->name }}</strong></div>  
          <div class="col-lg-6 text-right"><strong>Duration: {{$registration->from_dt}} to {{$registration->to_dt}}</strong></div>  
        </div>
        
        @if($attendances->pluck('participant_id')->contains($registration->participant->first()->id))
        <div class="row">
        <div class="col-md-6"><h3>Already Entered</h3></div>
        </div>                        
        
        @else
        {!! Form::open(['route' => 'users.attendances.store']) !!}
        {!! Form::hidden('session',$session) !!}
        <div class="row"><div class="col-lg-6"><h4>RPs</h4></div></div>
        <div class="row"><div class="col-lg-12">
            
                @foreach($registration->rps as $rp)
                    <div class="row">
                        <div class="col-md-2">{{$rp->name}}</div>
                        <div class="col-md-3">{{$rp->school->name}}</div>
                        <div class="col-md-1">{{$rp->type->name}}</div>
                        <div class="col-md-3">{{$rp->subject->name}}</div>
                        <div class="col-md-2">
                                    {!! Form::hidden('rp_id[]',$rp->id) !!}
                                    {!! Form::select('rp_present[]',[1 => 'Present',0 =>'Absent'], null, ['class' => 'form-control']) !!}
                                </div>
                    </div>
                @endforeach
                
        </div></div>
        <hr>
        
        <div class="row"><div class="col-lg-12">
               
               
                          
                              
                        <div class="row"><div class="col-lg-6"><h4>Participants</h4></div></div>
                        @foreach($registration->participant as $par)
                            <div class="row">
                                <div class="col-md-2">{{$par->name}}</div>
                                <div class="col-md-3">{{$par->school->name}}</div>
                                <div class="col-md-1">{{$par->type->name}}</div>
                                <div class="col-md-3">{{$par->subject->name}}</div>

                                <div class="col-md-2">
                                    {!! Form::hidden('participant_id[]',$par->id) !!}
                                    {!! Form::select('present[]',[1 => 'Present',0 =>'Absent'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        @endforeach
                    
                        @endif
                
        </div></div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <a href="{{ route('users.attendances.index') }}" class="btn btn-info">Back</a>
            </div>    
            <div class="col-md-6 text-right">
                {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
            
        </div>    
    </div>
    
</section>
@else
<section id="content">
	<div class="container">
    <h2>There is no session for this training today!</h2><br><br>
    <h5>Contact the Administrator if you need any help</h5>    
        <br>
    </div>
</section>
    @endif
@stop