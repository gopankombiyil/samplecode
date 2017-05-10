@extends('home.master')

@section('content')
    <section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <h4> Welcome to Darppanam</h4>
            </div>
        </div><br>
        <div class="row">
			<div class="col-lg-12">
                <h6> The logged in user is {{Auth::user()->name}}</h6>
            </div>
        </div>
    </div>
</section>

@stop