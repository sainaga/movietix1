@extends('layouts.master')

@section('content')
<div style="background-color: white; height: 80vh; margin-top: 97px; opacity: 0.1 !important;" class="d-none"></div>
	<div class="parallax"></div>
		<div class="text-center mb-5" style="poition: absolute; margin-top: -70vh;">
			<h4 class="text-white">DEFINE YOUR MOVIE EXPERIENCE
			ATTEND MOVIE SCREENING EVENTS HOST MOVIE SCREENING EVENTS</h4>
			<h5 class="text-white">MOVIETIX IS A PLATFORM FOR UCL MEMBERS BY UCL MEMBERS. 
			YOU CAN BROWSE MOVIE SCREENING EVENTS, OR EVEN HOST YOUR OWN!</h5>
			<a href="#" class="text-white btn btn-sm btn-info d-none"> VIEW POPULAR CATEGORIES</a>
		</div>

	<div style="height:300px;background-color:#c7c7c7;font-sze:36px; margin-top: 100px;" class="pt-5">
		<h4 class="text-center text-white">What Type Of User</h4>
		<div class="row">
			<div class="col-lg-6 text-center">
				<h5 class="text-white">I Am New Here</h5>
				<a href="/register" class="btn btn-xl btn-success">Register</a>
			</div>
			<div class="col-lg-6  text-center">
				<h5 class="text-white">Have Been Here Before</h5>
				<a href="/login" class="btn btn-xl btn-primary">Login</a>
			</div>
		</div>
	</div>
	<div class="parallax"></div>
@endsection