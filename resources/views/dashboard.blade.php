@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	<main class="dashboard">
	<div class="row">
		<!--first column -->
		<div class="col-lg-3 text-center border border-top-0 border-bottom-0">
			<h6 class="text-center bg-main p-2 rounded">Upcoming Movie Screenings</h6>
			@foreach($screenings as $screening)
				<div class="card mb-3">
						<h6 class="card-title text-center"><a href="/screening/{{$screening->slug}}" class="text-dark">{{$screening->movie->title}}</a> </h6>
					 <a href="/screening/{{$screening->slug}}"> <img class="card-img-top" src="/uploads/movies/{{$screening->movie->image}}" alt="Card image cap" class="img-fluid"> </a>
					  <div class="card-body">
					    <p class="card-text small text-justify text-muted">About: {{$screening->movie->description}}</p>
					  </div>
				</div>
			@endforeach
		</div>
		<!--second column -->
		<div class="col-lg-9 pl-5">
			<div class="row bg-info container h-25">
				<div class="col-lg-6"></div>
				<div class="col-lg-5 clearfix">
					<h4 class="mb-3 mt-3 text-warning">Discover Your Experience</h4>
					<form class="form-inline">
					  <div class="form-group mx-sm-3">
					    <label for="search" class="sr-only">Password</label>
					    <input type="text" class="form-control" id="search" name="search" placeholder="Type Something">
					  </div>
					  <button type="submit" class="btn bg-warning text-white">Go</button>
					</form>
				</div>	
			</div>
			<section class="mt-4">
				<h4 class="text-center">Quick Browse By Popular Genres</h4>
				<div class="row container">		
				@foreach($genres as $genre)	
					<div class="col-lg-3">
						<div class="card" style="height: 150px;">
						 <a href="/genre/browse/{{$genre->id}}"> <img class="card-img-top" src="/uploads/genres/{{$genre->image}}" alt="Card image cap" style="height: 150px;"> </a>
						  <div class="card-body" style="position: absolute; top: 30%; left: 19%;">
						    <h4 class="card-title p-0">{{$genre->name}}</h4>
						  </div>
						</div>
					</div>
				@endforeach
				</div>
			</section>
		</div>
	</div>
	</main>
@endsection