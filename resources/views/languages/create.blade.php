@extends('layouts.master')

@section('content')
<div style="height: 120px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 d-none"></div>
        	<div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-heading text-center pt-2"><h5>Add Language</h5></div>

                <div class="card-body">
                    <form class="" method="POST" action="/language/store">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="language" class="col-md-4 control-label">Language</label>
                            <div class="col-md-8">
                            	<input type="text" name="language" id="language" class="form-control" placeholder="Enter Language">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-secondary btn-block">
                                    Create Language
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <h6 class="mt-4">List Of Added Languages</h6>
            <ul class="list-group">
                @foreach($languages as $language)
                    <li class="list-group-item">{{$language->name}}</li>
                @endforeach
            </ul>
        </div>
		</div>	
	</div>
@endsection