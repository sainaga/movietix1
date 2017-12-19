@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	<section class="container">
		<h4 class="text-center mb-4">People who attended {{$screening->movie->title}} shown {{$screening->date->diffForHumans()}}</h4>
		<div class="row">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">First Name</th>
			      <th scope="col">Last Name</th>
			      <th scope="col">Username</th>
			      <th scope="col">Date Booked</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($tickets as $index => $ticket)
				    <tr>
				      <th scope="row">{{$index + 1}}</th>
				      <td>{{$ticket->user->firstname}}</td>
				      <td>{{$ticket->user->lastname}}</td>
				      <td>{{$ticket->user->username}}</td>
				      <td>{{$ticket->user->created_at}}</td>
				    </tr>
			    @endforeach
			  </tbody>
			</table>
			<a href="/download/ticket/{{$screening->slug}}" class="btn btn-secondary btn-sm mt-4 d-none">Download Attendees</a>
		</div>
	</section>
@endsection