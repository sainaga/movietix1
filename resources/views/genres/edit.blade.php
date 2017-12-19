@extends('layouts.master')

@section('content')
<div style="height: 120px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 d-none"></div>
        	<div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-heading text-center pt-2"><h5>Edit {{$genre->name}}</h5></div>

                <div class="card-body">
                    <form class="" method="POST" action="/genre/update/{{$genre->id}}" files="true" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Genre Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name of Genre" value="{{$genre->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 control-label">Image</label>
                            <div class="col-md-8">
                            	<input type="file" name="image" id="image" class="form-control" value="{{$genre->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-secondary btn-block">
                                    Create Genre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h6 class="mt-4">List Of Added Genres</h6>
            <ul class="list-group">
                @foreach($genres as $genr)
                    <li class="list-group-item">{{$genr->name}} <a href="/genre/{{$genr->id}}">Update</a> </li>
                @endforeach
            </ul>
        </div>
		</div>	
	</div>
@endsection