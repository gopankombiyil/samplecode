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
        <div class="col-lg-12"><h2>Add Participants</h2></div>
</div>    
{!! Form::open([
    'route' => 'users.participants.store'
]) !!}
<div class="row">
<div class="form-group col-lg-6">
    <input type="hidden" name="registration_id" value="{{$id}}">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div></div>
 <div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('school_id', 'School:', ['class' => 'control-label']) !!}
        {!! Form::select('school_id',$sch, null, ['class' => 'form-control']) !!}
    </div>
</div>       
<div class="row">
<div class="form-group col-lg-6">
    {!! Form::label('email', 'email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div></div>   
<div class="row">
<div class="form-group col-lg-6">
    {!! Form::label('mobile', 'Mobile No:', ['class' => 'control-label']) !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
    </div></div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('type_id', 'Type:', ['class' => 'control-label']) !!}
        {!! Form::select('type_id',$typ, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('subject_id', 'Subject:', ['class' => 'control-label']) !!}
        {!! Form::select('subject_id',$sub, null, ['class' => 'form-control']) !!}
    </div>
</div>        
<div class="row">  
    <div class="col-lg-2"><a href="{{ route('users.registrations.index') }}" class="btn btn-danger">Back</a></div>    
    <div class="col-lg-4 text-right">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
</section>
@stop