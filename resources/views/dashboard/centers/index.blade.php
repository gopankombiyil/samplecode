@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        @include('partials.flash')
    <div class="row">
        <div class="col-lg-12"><h2>Training Centers</h2></div>
    </div>    
    <div class="row">
        <div class="col-md-12"><a href="{{ route('users.centers.create') }}" data-toggle="tooltip" title="Add A Center" class="btn btn-md btn-warning">Add New</a></div>
    </div>
    @foreach($centers as $center)
        <div class="row">
            <div class="col-md-8">{{$center->name}}</div>
            <div class="col-md-2 text-right"><a href="{{ route('users.centers.edit', $center->id) }}" data-toggle="tooltip" title="Edit Center" class="btn btn-info btn-md"><span class="fa fa-edit"></span></a></div>
            <div class="col-md-2 text-right">{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.centers.destroy', $center->id]
        ]) !!}
            {!! Form::submit('Delete Center', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</div>
        </div>
    @endforeach
        
    </div>
</section>
@stop