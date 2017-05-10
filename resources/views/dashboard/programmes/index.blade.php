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
        <div class="col-lg-12"><h2>Training Programmes</h2></div>
    </div>    
    <div class="row">
        <div class="col-md-12"><a href="{{ route('users.programmes.create') }}" data-toggle="tooltip" title="Add A Training" class="btn btn-md btn-warning">Add New</a></div>
    </div>
    @foreach($programmes as $programme)
        <div class="row">
            <div class="col-md-8">{{$programme->name}}</div>
            <div class="col-md-2 text-right"><a href="{{ route('users.programmes.edit', $programme->id) }}" data-toggle="tooltip" title="Edit Programme" class="btn btn-info btn-md"><span class="fa fa-edit"></span></a></div>
            <div class="col-md-2 text-right">{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.programmes.destroy', $programme->id]
        ]) !!}
            {!! Form::submit('Delete Programme', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</div>
        </div>
    @endforeach
        
    </div>
</section>
@stop