@extends('layouts.master')

@section('content')
<div style="height: 120px;"></div>
    <div class="container">	
        <h4 class="text-center">Events On {{$genre->name}}</h4>
        <div class="row">
            @foreach($screenings as $screening)
                <div class="col-sm-4">
                    <div class="card mb-3">
                      <div class="card-header"> <span class="small float-right text-muted">showing {{$screening->date->diffForHumans()}}</span> <a href="/screening/{{$screening->slug}}" class="text-info"> {{$screening->movie->title}}</a></div>
                      <div class="card-body text-primary">
                       <a href="/screening/{{$screening->slug}}"> <img class="card-img-top img-fluid" src="/uploads/movies/{{$screening->movie->image}}" alt="Card image cap" style="height: 200px;"> </a>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection