@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	<section class="container">
		<h4>Hi, {{Auth::user()->username}}, </h4>
		<div class="row">
			<a href="/account/{{Auth::user()->username}}/profile" class="btn btn-xl btn-primary mr-4">My Profile</a>
			<a href="/account/{{Auth::user()->username}}/upcomingevents" class="btn btn-xl btn-primary mr-4 ml-5">Upcoming Events</a>
			<a href="/account/{{Auth::user()->username}}/myevents" class="btn btn-xl btn-info mr-4 ml-5">My Events</a>
			<a href="/account/{{Auth::user()->username}}/pastevents" class="btn btn-xl btn-primary mr-4 ml-5">Past Events</a>
		</div>
		<h6 class="mt-5">You are hosting {{$screenings_count}} events soon. </h6>
		@foreach($screenings as $screening)
			<div class="row bg-info p-3">
				<div class="col-lg-2">
					<img class="card-img-top rounded" src="/uploads/movies/{{$screening->movie->image}}" alt="Card image cap" class="img-fluid">
				</div>
				<div class="col-lg-7 border border-bottom-0 border-top-0 border-left-0">
					<ul class="float-right list-unstyled">
						<span class="text-white">Ticket Details</span>
						<li class="small text-white">Tickets sold: {{$screening->tickets()->count()}}</li>
						<li class="small text-white">Tickets available: {{$screening->no_tickets - $screening->tickets()->count()}}</li>
						<li class="small text-white">End date: {{$screening->date->diffForHumans()}}</li>
					</ul>
					<h6 class="text-white">{{$screening->movie->title}}</h6>
					<p class="small text-white">{{$screening->movie->description}}</p>
					
				</div>
				<div class="col-lg-2">
					<a href="/show/attendees/{{$screening->slug}}" class="btn btn-light btn-sm">See all attending</a>
				</div>
			</div>
		@endforeach
	</section>
@endsection