@extends('layouts.master')

@section('content')
	<div style="height: 120px;"></div>
	
	<section class="container">
		<browse></browse>
		<div class="row d-none">
			<div class="col-lg-3 border border-bottom-0 border-left-0 border-top-0">
				<form action="search" method="post">
					<div class="col-sm-12 mb-2">
				      <label class="sr-only" for="query">Query</label>
				      <div class="input-group mb-2 mb-sm-0">
				        <input type="text" class="form-control" name="query" id="query" placeholder="Search">
				          <button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
				      </div>
				    </div>
					<h5 class="text-center">Refine Search By</h5>
					<div class="card mb-4 p-3">
						<h6>Genre</h6>
						@foreach($genres as $genre)
							<div class="d-flex justify-content-start">
								<input type="checkbox" name="genre" value='{{$genre->id}}' class="mr-5"><label>{{$genre->name}}</label>
							</div>
						@endforeach
					</div>
					<div class="card mb-4 p-3">
						<h6>Genre</h6>
						@foreach($languages as $language)
							<div class="d-flex justify-content-start">
								<input type="checkbox" name="genre" value='{{$language->id}}' class="mr-5"><label>{{$language->name}}</label>
							</div>
						@endforeach
					</div>
					<div class="card mb-4 p-3">
						<h6>Date Of Screening</h6>
						<div class="">
							<label>Start Date</label>
							<input type="date" name="startdate" class="mr-5 mb-2">
							<label>End Date</label>
							<input type="date" name="enddate" class="mr-5">
							<input type="text" id="datepicker" class="d-none">
						</div>
					</div>
				</form>
			</div>
			<!--second column-->
			<div class="col-lg-9">
				<h1 class="text-center display-2 text-muted mt-5">Your Search Results Appear Here</h1>
			</div>
		</div>
	</section>
@endsection