@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        @include('partials.flash')
    <div class="row">
        <div class="col-lg-12"><h2>News Items</h2></div>
    </div>    
    <div class="row">
        <div class="col-md-12"><a href="{{ route('users.tickers.create') }}" data-toggle="tooltip" title="Add A News" class="btn btn-md btn-warning">Add New</a></div>
    </div><br>
    <div class="row">
        <div class="col-md-4"><strong>News</strong></div>    
        <div class="col-md-4"><strong>Link</strong></div> 
        </div><br>
    @foreach($tickers as $ticker)
        <div class="row">
            <div class="col-md-4">{{$ticker->newsitem}}</div>
            <div class="col-md-4">{{$ticker->link}}</div>
            <div class="col-md-2 text-right"><a href="{{ route('users.tickers.edit', $ticker->id) }}" data-toggle="tooltip" title="Edit News Item" class="btn btn-info btn-md"><span class="fa fa-edit"></span></a></div>
            <div class="col-md-2 text-right">{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.tickers.destroy', $ticker->id]
        ]) !!}
            {!! Form::submit('Delete News Item', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</div>
        </div>
    @endforeach
        
    </div>
</section>
@stop