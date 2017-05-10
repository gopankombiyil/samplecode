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
        <div class="col-lg-12"><h2>Register Training</h2></div>
</div>    
{!! Form::open([
    'route' => 'users.registrations.store'
]) !!}
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('center_id', 'Name of Center:', ['class' => 'control-label']) !!}
        {!! Form::select('center_id',$cen, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {!! Form::label('programme_id', 'Name of Programme:', ['class' => 'control-label']) !!}
        {!! Form::select('programme_id',$prg, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('from_dt', 'From:', ['class' => 'control-label']) !!}
        {!! Form::text('from_dt', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('to_dt', 'To:', ['class' => 'control-label']) !!}
        {!! Form::text('to_dt', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-3">
        {!! Form::label('rp', 'No. of RPs', ['class' => 'control-label']) !!}
        {!! Form::text('rp', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-lg-3">
        {!! Form::label('participants', 'No. of Participants:', ['class' => 'control-label']) !!}
        {!! Form::text('participants', null, ['class' => 'form-control']) !!}
    </div>
</div>                
<div class="row">  
    <div class="col-lg-2"><a href="{{ route('users.registrations.index') }}" class="btn btn-danger">Back</a></div>    
    <div class="col-lg-4 text-right">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
        
</div>
</section>
@stop

@section('footer')
    <script>
        $(function() {
            $( "#from_dt" ).datepicker({dateFormat: "dd-mm-yy",      
            defaultDate: "+1d",
            changeMonth: true,
            numberOfMonths: 1});
            $( "#to_dt" ).datepicker({dateFormat: "dd-mm-yy",      
            defaultDate: "+1d",
            changeMonth: true,
            numberOfMonths: 1}); 
        });
    </script>  
@stop