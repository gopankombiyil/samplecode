@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
<div class="row">
        <div class="col-lg-12"><h2>Add A News Item</h2></div>
</div>  
{!! Form::open([
    'route' => 'users.tickers.store'
]) !!}
<div class="row">
<div class="form-group col-lg-6">
    {!! Form::label('newsitem', 'News:', ['class' => 'control-label']) !!}
    {!! Form::text('newsitem', null, ['class' => 'form-control']) !!}
    </div></div>
<div class="row">        
<div class="form-group col-lg-6">
    {!! Form::label('link', 'Link:', ['class' => 'control-label']) !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
    </div></div>  
<div class="row">  
    <div class="col-lg-2"><a href="{{ route('users.tickers.index') }}" class="btn btn-danger">Back</a></div>    
    <div class="col-lg-4 text-right">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
</section>
@stop