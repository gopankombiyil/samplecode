@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p>{{ Session::get('message') }}</p>		
        </div>	
    @endif
    <div class="row">
        <div class="col-lg-12"><h2>Schools</h2></div>
    </div>    
    <div class="row">
        <div class="col-md-12"><a href="{{ route('users.schools.create') }}" data-toggle="tooltip" title="Add A Training" class="btn btn-md btn-warning">Add New</a></div>
    </div>
         <div class="row">
            <div class="col-md-3"><strong>Name</strong></div>
            <div class="col-md-2"><strong>Education Dist.</strong></div>
        <div class="col-md-2"><strong>Sub Dist.</strong></div>
        </div>
    @foreach($schools as $school)
        <div class="row">
            <div class="col-md-3">{{$school->name}}</div>
            <div class="col-md-2">{{$school->edu_district}}</div>
            <div class="col-md-2">{{$school->sub_district}}</div>
            <div class="col-md-1 text-right"><a href="{{ route('users.schools.show', $school->id) }}" data-toggle="tooltip" title="Show School" class="btn btn-primary btn-md"><span class="fa fa-list"></span></a></div>
            <div class="col-md-1 text-right"><a href="{{ route('users.schools.edit', $school->id) }}" data-toggle="tooltip" title="Edit School" class="btn btn-info btn-md"><span class="fa fa-edit"></span></a></div>
            <div class="col-md-1 text-right">{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.schools.destroy', $school->id]
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</div>
        </div>
    @endforeach
    <div class="row">    
        <div class="col-md-12">{!! $schools->render() !!}</div>
    </div>    
    </div>
</section>
@stop