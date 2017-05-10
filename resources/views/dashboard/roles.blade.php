@extends('home.master')

@section('content')
    <section id="content">
	<div class="container">
        @if (isset($message))
            <div class="flash alert-info">
                <p>{{ $message }}</p>		
            </div>	
        @endif
		<div class="row">
			<div class="col-lg-12">
                <h2>Assign Roles to users</h2>
            </div></div>
        <div class="row">
			<div class="col-lg-3">
                <strong>Name</strong>
            </div>
            <div class="col-lg-3">
                <strong>email</strong>
            </div>
            <div class="col-lg-3">
                <strong>Current Roles</strong>
            </div>
            <div class="col-lg-3">
                <strong>Assign Roles</strong>
            </div>
        </div>
        <div class="row">
			<div class="col-lg-12">
                @foreach($users as $user)
                    <div class="row">
                        <div class="col-lg-3">{{ $user->name }}</div>
                        <div class="col-lg-3">{{ $user->email }}</div>
                        <div class="col-lg-3">
                        <u>    
                            @foreach($user->roles()->pluck('name') as $existing)
                                <li class="badge">{{$existing}}</li>
                            @endforeach
                        </u>
                        </div>
                        <div class="col-lg-3">
                            <form method="post" action="/users/roles">
                            <input type="hidden" name="user" value="{{$user->id}}">
                            <input type="hidden" name="page" value="{{$users->currentPage()}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-8">
                                        {!! Form::select('roles', $rol, null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-4 text-right">
                                        {!! Form::submit('Assign Role', ['class' => 'btn btn-primary']) !!}
                                    </div>    
                                </div>    
                            </form>
                            
                            
                        
                        </div>
                        
                    </div>   
                
                @endforeach
            </div>
        </div>
        {!! $users->render() !!}
    </div>
</section>

@stop