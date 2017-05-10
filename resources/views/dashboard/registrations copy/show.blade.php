@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-2">
                <h4>Attendance for {{Carbon\Carbon::today()->timezone('Asia/Kolkata')->format('d-m-Y')}}</h4>
            </div>
            
        </div>
        
        
        <hr>
        <div class="row">
          <div class="col-lg-6"><strong>Center: {{ $registration->center->name }}</strong></div>  
          <div class="col-lg-6 text-right"><strong>Duration: {{$registration->from_dt}} to {{$registration->to_dt}}</strong></div>  
        </div>
        <div class="row"><div class="col-lg-6"><h4>RPs</h4></div></div>
        <div class="row"><div class="col-lg-12">
            
                @foreach($registration->rps as $rp)
                    <div class="row">
                        <div class="col-md-2">{{$rp->name}}</div>
                        <div class="col-md-3">{{$rp->school->name}}</div>
                        <div class="col-md-2">{{$rp->type->name}}</div>
                        <div class="col-md-3">{{$rp->subject->name}}</div>
                        <div class="col-md-1 text-right">
                             {!! Form::submit('Mark', ['class' => 'btn btn-primary btn-xs']) !!}
                        </div>
                    </div>
                @endforeach
                
        </div></div>
        <hr>
        <div class="row"><div class="col-lg-6"><h4>Participants</h4></div></div>
        <div class="row"><div class="col-lg-12">
                
                @foreach($registration->participant as $par)
                    <div class="row">
                        <div class="col-md-2">{{$par->name}}</div>
                        <div class="col-md-3">{{$par->school->name}}</div>
                        <div class="col-md-2">{{$par->type->name}}</div>
                        @foreach($attendances as $att)
                            
                            @if($att->participant_id == $par->id && $att->session == $session)
                                Already there fff
                            @endif
                                <div class="col-md-1 text-right">
                                    {!! Form::open(['route' => 'users.attendances.store']) !!}

                                    {!! Form::hidden('participant_id', $par->id) !!}
                                    {!! Form::hidden('session', $session) !!}
                                    {!! Form::checkbox('present') !!}
                                </div>    
                                 <div class="col-md-1 text-right">   
                                    {!! Form::submit('Mark', ['class' => 'btn btn-primary btn-xs']) !!}
                                    {!! Form::close() !!}
                                </div>
                            
                        @endforeach
                        
                    </div>
                @endforeach
                
        </div></div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('users.attendances.index') }}" class="btn btn-info">Back</a>
            </div>    
            
        </div>    
    </div>
</section>
@stop