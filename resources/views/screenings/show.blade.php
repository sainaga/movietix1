@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	
	<section class="container">
		<div class="row d-flex justify-content-between pr-5">
			<h4 class="ml-3">{{$screening->movie->title}}</h4>
			@if($still_on)	
				@if($available_tickets == 0)
				<h6 class="mr-5 text-warning">Tickets are finished!</h6>
				@else
					<h6 class="mr-5"><a href="/book/ticket/{{$screening->slug}}" class="btn bg-main btn-sm text-white">Book Now </a> <span class="small text-info">{{$available_tickets}} remaining</span><br> <small class="text-info">Ending {{$end_date->diffForHumans()}}</small> </h6>
				@endif
			@else
				<p class="small text-warning">Event has passed</p>
			@endif
		</div>
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<img class="card-img-top img-fluid" src="/uploads/movies/{{$screening->movie->image}}" alt="Card image cap" style="height: 250px;">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-6">
				<h6>More Information:</h6>
				<div class="d-flex justify-content-between">
					<ul class="list-unstyled">
						<li class="small">Date: {{$screening->date}}</li>
						<li class="small">Location: {{$screening->location}}</li>
						<li class="small">Total Tickets: {{$screening->no_tickets}}</li>
						<li class="small">Duration: {{$screening->movie->duration}} mins</li>
					</ul>
					<ul class="list-unstyled d-none">
						<li class="small">Director: </li>
						<li class="small">Cast: </li>
						<li class="small">Producer: </li>
					</ul>
				</div>
				<h6 class="text-secondary mt-4"><b>Movie Description:</b></h6>
				<p class="ml-3">{{$screening->movie->description}}</p>
				@if(!$still_on)	
				<h6 class="text-secondary mt-4"><b>Drop Review:</b></h6>
				<form action="/screening/review/{{$screening->slug}}" method="post" files="true" enctype="multipart/form-data">
					 {{ csrf_field() }}
				  <div class="form-group row">
				    <label for="review" class="col-sm-2 col-form-label col-form-label-sm">Review</label>
				    <div class="col-sm-10">
				    	<textarea class="form-control form-control-sm" name="review" id="review" placeholder="Type Review"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="rating" class="col-sm-2 col-form-label col-form-label-sm">Rating</label>
				    <div class="col-sm-3">
				    	<select name="rating" class="form-control form-control-sm" id="rating">
				    		<option value="1">1</option>
				    		<option value="2">2</option>
				    		<option value="3">3</option>
				    		<option value="4">4</option>
				    		<option value="5">5</option>
				    	</select>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<div class="col-sm-4"></div>
		                <div class="col-md-8">
		                    <button type="submit" class="btn btn-secondary btn-sm btn-block">
		                        Leave Review
		                    </button>
		                 </div>
		           </div>
				</form>
				@endif
				<h6 class="mt-2 mb-3 text-secondary"><b>What people are saying about this movie:</b></h6>
				<ul class="list-group">
					@if(!$still_on)			
						@foreach($reviews as $review)
							 <li class="list-group-item p-1">
							  	<p class="small float-right">Date: {{$review->created_at->diffForHumans()}}</p>
							  	<p>{{$review->user->username}}</p>
							  	<p class="small">Review:{{$review->review}}</p>
							  </li> 
						@endforeach
					@else
						<p class="small text-warning">No reviews yet!</p>
					@endif
				</ul>
			</div>
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<h6>Summary of movie ratings:</h6>
				<ul class="list-unstyled">
					<li>* * * * * <span class="small">({{$five}})</span></li>
					<li>* * * * <span class="small">({{$four}})</span></li>
					<li>* * * <span class="small">({{$three}})</span></li>
					<li>* * <span class="small">({{$two}})</span></li>
					<li>* <span class="small">({{$one}})</span></li>
				</ul>
			</div>
		</div>
	</section>
@endsection