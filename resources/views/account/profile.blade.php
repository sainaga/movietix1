@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	<section class="container">
		<h4>Hi, {{Auth::user()->username}}, </h4>
		<div class="row mt-2">
			<a href="/account/{{Auth::user()->username}}/profile" class="btn btn-xl btn-primary mr-4">My Profile</a>
			<a href="/account/{{Auth::user()->username}}/upcomingevents" class="btn btn-xl btn-primary mr-4 ml-5">Upcoming Events</a>
			<a href="/account/{{Auth::user()->username}}/myevents" class="btn btn-xl btn-primary mr-4 ml-5">My Events</a>
			<a href="/account/{{Auth::user()->username}}/pastevents" class="btn btn-xl btn-primary mr-4 ml-5">Past Events</a>
		</div>
		<h4 class="mt-3 mb-4">My Profile</h4> 
		<div class="row">
			<div class="col-lg-7">
				<h6 class="mb-3">Login Details</h6>
				<form class="" method="POST" action="/account/update/profile">
					 {{ csrf_field() }}
				@if(checkPermission(['student']))
				  <div class="form-group row">
				    <label for="title" class="col-sm-3 col-form-label">Title</label>
				    <div class="col-sm-6">
				      <input type="text" readonly class="form-control-plaintext" value="Student" disabled>
				    </div>
				  </div>
				  @else
				  	<div class="form-group row">
					    <label for="title" class="col-sm-3 col-form-label">Title</label>
					    <div class="col-sm-6">
					      <input type="text" readonly class="form-control-plaintext" value="Staff" disabled>
					    </div>
					  </div>
				  @endif
				  <div class="form-group row">
				    <label for="firstname" class="col-sm-3 col-form-label small">Firstname</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="{{Auth::user()->firstname}}">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="lastname" class="col-sm-3 col-form-label small">Lastname</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="{{Auth::user()->lastname}}">
				    </div>
				  </div> 
				  <h6>Contact:</h6>
				  <div class="form-group row">
				    <label for="mobile_number" class="col-sm-3 col-form-label small">Mobile Number</label>
				    <div class="col-sm-6">
				      <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="{{Auth::user()->mobile_no}}">
				    </div>
				  </div> 
				  <div class="form-group row">
				    <label for="home_number" class="col-sm-3 col-form-label small">Home Number</label>
				    <div class="col-sm-6">
				      <input type="number" class="form-control" name="home_number" id="home_number" placeholder="Home Number" value="{{Auth::user()->home_no}}">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="email" class="col-sm-3 col-form-label small">Email</label>
				    <div class="col-sm-6">
				      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{Auth::user()->email}}">
				    </div>
				  </div> 
				  <div class="form-group row">
				    <div class="col-sm-3"></div>
				    <div class="col-sm-6">
				      <input type="submit" class="form-control btn btn-success btn-sm" id="submit" value="Update">
				    </div>
				  </div>
				</form>
			</div>
			<div class="col-lg-5">
				<img src="/uploads/profile/{{Auth::user()->image}}" class="img-fluid w-25" alt="
				{{Auth::user()->username}}">
				<form class="" method="POST" action="/account/update/profile" files="true" enctype="multipart/form-data">
					 {{ csrf_field() }}
				<div class="form-group row">
				    <label for="image" class="col-sm-3 col-form-label small">Upload Image</label>
				    <div class="col-sm-6">
				      <input type="file" class="form-control btn-sm btn-info" name="image" id="image">
				    </div>
				  </div> 
				  <div class="form-group row">
				    <div class="col-sm-3"></div>
				    <div class="col-sm-6">
				      <input type="submit" class="form-control bts btn-sm" id="submit" value="Save">
				    </div>
				  </div>
				</form>
				<a href="/remove/account" class="btn btn-danger btn-sm">Remove Account</a>
			</div>
		</div>
	</section>
@endsection