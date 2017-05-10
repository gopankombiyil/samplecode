@extends('home.master')

@section('content')
<section id="content">
	<div class="container">
        <div class="row">
            <div class="col-lg-12"><h2>Modify Training Programme</h2></div>
        </div>    
        @include('partials.alerts.errors')

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        {!! Form::model($programme, [
            'method' => 'PATCH',
            'route' => ['users.programmes.update', $programme->id]
        ]) !!}
        <div class="row">
            <div class="form-group col-lg-6">
                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>    
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('users.programmes.index') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="col-md-4 text-right">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>    
        
        </div>    
    </div>
</section>
@stop