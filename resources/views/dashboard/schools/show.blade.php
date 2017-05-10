@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        <h1>{{ $school->name }}</h1>
        <hr>
        <div class="row">
            <div class="col-md-3"><strong>Education District : </strong>{{$school->edu_district}}</div>
            <div class="col-md-3"><strong>Sub District : </strong>{{$school->sub_district}}</div>
            <div class="col-md-3"><strong>Code : </strong><div class="badge">{{$school->code}}</div></div>
            <div class="col-md-3"><strong>Finance Type : </strong>{{$school->finance_type}}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Level Type : </strong>{{$school->level_type}}</div>
            <div class="col-md-3"><strong>Level Name : </strong>{{$school->level_name}}</div>
            
        </div><br>
        <div class="row">
            <div class="col-md-6"><strong>Contact Number of School : </strong>{{$school->phone_school}}</div>
            <div class="col-md-3"><strong>Name of HM : </strong>{{$school->name_hm}}</div>
            <div class="col-md-3"><strong>Contact Number of HM : </strong>{{$school->phone_hm}}</div>
            
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('users.schools.index') }}" class="btn btn-info">Back To All Schools</a>
                <a href="{{ route('users.schools.edit', $school->id) }}" class="btn btn-primary">Edit School</a>
            </div>    
            <div class="col-md-6 text-right">
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['users.schools.destroy', $school->id]
                ]) !!}
                {!! Form::submit('Delete School', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>    
    </div>
</section>
@stop