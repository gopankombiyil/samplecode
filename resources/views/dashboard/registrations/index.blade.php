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
        <div class="col-lg-12"><h2>Registrations</h2></div>
    </div>
    <div class="row">
        <div class="col-md-12"><a href="{{ route('users.registrations.create') }}" data-toggle="tooltip" title="Register a Training" class="btn btn-md btn-warning">Add New</a></div>
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
            <div class="col-md-3"><a href="{{ route('users.registrations.show',$registration->id) }}"><strong>{{$registration->center->name}}</strong></a></div>
            <div class="col-md-2">{{ $registration->programme->name }}</div>
            <div class="col-md-3">{{$registration->from_dt}} to {{$registration->to_dt}}</div>
            <div class="col-md-1 text-right"><a href="{{ route('users.rps.add', $registration->id) }}" data-toggle="tooltip" title="Add RP" class="btn btn-success btn-md"><span class="fa fa-user"> <strong>{{ $registration->rps->count() }}/{{$registration->rp}}</strong></span></a></div>
            <div class="col-md-1 text-right"><a href="{{ route('users.participants.add', $registration->id) }}" data-toggle="tooltip" title="Add Participants" class="btn btn-warning btn-md"><span class="fa fa-users"> <strong>{{ $registration->participant->count() }}/{{$registration->participants}}</strong></span></a></div>
            <div class="col-md-1 text-right"><a href="{{ route('users.registrations.edit', $registration->id) }}" data-toggle="tooltip" title="Edit Registration" class="btn btn-info btn-md"><span class="fa fa-edit"></span></a></div>
            <div class="col-md-1 text-right">{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.registrations.destroy', $registration->id]
        ]) !!}
            {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">{!! $registrations->render() !!}</div>
        </div>
    @else
        @foreach($regusers as $registration)

        <div class="row">
             <div class="col-md-3"><a href="{{ route('users.registrations.show',$registration->id) }}"><strong>{{$registration->center->name}}</strong></a></div>
            <div class="col-md-2">{{$registration->programme->name}}</div>
            <div class="col-md-3">{{$registration->from_dt}} to {{$registration->to_dt}}</div>
            <div class="col-md-1 text-right"><a href="{{ route('users.rps.add', $registration->id) }}" data-toggle="tooltip" title="Add RP" class="btn btn-success btn-md"><span class="fa fa-user"> <strong>{{ $registration->rps->count() }}/{{$registration->rp}}</strong></span></a></div>
            <div class="col-md-1 text-right"><a href="{{ route('users.participants.add', $registration->id) }}" data-toggle="tooltip" title="Add Participants" class="btn btn-warning btn-md"><span class="fa fa-users"> <strong>{{ $registration->participant->count() }}/{{$registration->participants}}</strong></span></a></div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">{!! $regusers->render() !!}</div>
        </div>
    @endhasrole


    </div>
</section>
@stop
