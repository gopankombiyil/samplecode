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
        <div class="col-lg-12"><h2>Add A Training Center</h2></div>
</div>    
{!! Form::open([
    'route' => 'users.centers.store'
]) !!}
<div class="row">
<div class="form-group col-lg-6">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div></div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('rpincharge', 'Name of RP:', ['class' => 'control-label']) !!}
        {!! Form::select('rpincharge',$usr, null, ['class' => 'form-control']) !!}
    </div>
</div>        
<div class="row">  
    <div class="col-lg-2"><a href="{{ route('users.centers.index') }}" class="btn btn-danger">Back</a></div>    
    <div class="col-lg-4 text-right">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
</section>
@stop