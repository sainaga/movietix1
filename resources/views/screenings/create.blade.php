@extends('layouts.master')

@section('content')
<div style="height: 120px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 d-none"></div>
        	<div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-heading text-center pt-2"><h5>Register An Upcoming Event</h5></div>

                <div class="card-body">
                    <form class="" method="POST" action="/event/create" files="true" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h6 class="text-center">Screening Details</h6>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 control-label">Location</label>
                            <div class="col-md-8">
                                <select name="location" class="form-control" id="location" required>
                                    <option value="Roberts 106">Roberts 106</option>
                                    <option value="Jeremy Bentham Room">Jeremy Bentham Room</option>
                                    <option value="Wilkins Terrace Room">Wilkins Terrace Room</option>
                                    <option value="Engineering Front Building 2.3">Engineering Front Building 2.3</option>
                                    <option value="Chadwick 1.2">Chadwick 1.2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre_id" class="col-md-4 control-label">Genre</label>
                            <div class="col-md-8">
                            	<select class="form-control" name="genre_id" id="genre_id" required>
                            		@foreach($genres as $genre)
                            			<option value="{{$genre->id}}">{{$genre->name}}</option>
                            		@endforeach
                            	</select>
                            </div>
                        </div>
                        <div class="form-row">
						    <div class="form-group col-md-4"></div>
						    <div class="form-group col-md-4">
						      <label for="tickets" class="col-md-4 control-label">Ticket</label>
						      <input type="text" name="tickets" id="tickets" class="form-control" placeholder="No. of tickets" required>
						    </div>
						    <div class="form-group col-md-4">
						     <label for="date" class="col-md-4 control-label">Date</label>
						      <input type="date" name="date" id="date" class="form-control" placeholder="Time For Show" required>
						    </div>
						  </div>
                        <h6 class="text-center">Movie Details</h6>
                        <div class="form-group row">
                            <label for="movie_title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-8">
                            	<input type="text" name="movie_title" id="movie_title" class="form-control" placeholder="Movie Title" required>
                            </div>
                        </div>
						 <div class="form-group row">
                            <label for="movie_description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="movie_description" id="movie_description" placeholder="Describe Movie" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="movie_duration" class="col-md-4 control-label">Duration <small>(mins)</small></label>
                            <div class="col-md-4">
                                <input type="number" name="movie_duration" class="form-control" id="movie_duration" placeholder="Duration in minutes">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 control-label">Display Picture</label>
                            <div class="col-md-8">
                                 <input type="file" class="form-control btn-sm btn btn-info" id="image" name="image" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language_id" class="col-md-4 control-label">Language</label>
                            <div class="col-md-8">
                            	<select class="form-control" name="language_id" id="language_id" required>
                            		@foreach($languages as $language)
                            			<option value="{{$language->id}}">{{$language->name}} {{$language->id}}</option>
                            		@endforeach
                            	</select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-secondary btn-block">
                                    Create Event
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		</div>	
	</div>
@endsection