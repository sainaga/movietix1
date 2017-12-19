@extends('layouts.master')

@section('content')
<section class="container-fluid">
	<div class="container">
    <div style="height: 120px;"></div>
    <h3 class="text-center jumbotron bg-info text-white">About MovieTix</h3>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            
        </div>
    </div>
    <h4 class="d-non">About </h4>
    	<div class="row">
    		<div class="col-sm-6">
    			<img src="/images/about.jpg" class="img-fluid" stle="height: 60%; width: 100%;">
    		</div>
    		<div class="col-sm-6">
    			<h4>WHY WE ARE DIFFERENT</h4>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequun. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
    		</div>

    	</div>
   </div>
    	<div class="row mt-5">
    		<div class="col-sm-4 my-auto bg-info pt-5 border border-bottom-0" style="height: 320px">
    			<h4 class="text-white">Why Choose Us</h4>
				<p class="text-white">An All-In-One integrated platform like no other - you have the opportunity to create movie screening events for fellow UCL students, and also attend those hosted by fellow students. Make friends through your common interests!</p>
    		</div>
    		<div class="col-sm-4 my-auto bg-info pt-5 border border-bottom-0" style="height: 320px">
    			<h4 class="text-white">What You Get</h4>
				<p class="text-white">For hosting events: create event, obtain payment and manage your participants list here. 
				For attending events: browse events, make payment and obtain emailed updates through this platform.!</p>
    		</div>
    		<div class="col-sm-4 my-auto bg-info pt-5" style="height: 320px">
    			<h4 class="text-white">Spread the Word!</h4>
				<p class="text-white">If you enjoy using our service, spread the word to your friends. Who knows you might be the next lucky winner in our monthly contest! Winners are entitled to a fortnight-long free movie pass - you wouldn't want to miss this chance!</p>
    		</div>
    	</div>
    <div class="container">
    	<h3 class="m-5 text-center">Meet The MovieTix Team</h3>
    	<div class="row">
    		<div class="col-sm-3">
    			<div class="card">
				  <img class="card-img-top" src="/images/team-1.jpg" alt="">
				  <div class="card-body">
				    <h4 class="card-title mb-0 text-main">Jonathon Andrew</h4>
				    <p class="small mt-0">Founder, Managing Director</p>
				    <p class="card-text">Jonathon is the driving force behind MovieTix. This idea came to him while he was at the movies and thought what a great idea it would be to bring students together through common interests.</p>
				  </div>
				  <ul class="list-group list-group-flush d-none">
				    <li class="list-group-item">Cras justo odio</li>
				    <li class="list-group-item">Dapibus ac facilisis in</li>
				    <li class="list-group-item">Vestibulum at eros</li>
				  </ul>
				  <div class="card-body">
				    <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a>
				  </div>
				</div>
    		</div>
    		<div class="col-sm-3">
    			<div class="card">
				  <img class="card-img-top" src="/images/team-2.jpg" alt="">
				  <div class="card-body">
				    <h4 class="card-title mb-0 text-main">Jesmin Martina</h4>
				    <p class="small mt-0">Vice-President</p>
				    <p class="card-text">Jesmin is the vice-president of MovieTix. She brings together the rest of the team to make this platform possible for all UCL staff and students. She is also an active movie-goer at the cinemas!</p>
				  </div>
				  <div class="card-body">
				    <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a>
				  </div>
				</div>
    		</div>
    		<div class="col-sm-3">
    			<div class="card">
				  <img class="card-img-top" src="/images/team-3.jpg" alt="">
				  <div class="card-body">
				    <h4 class="card-title mb-0 text-main">Joe Thompson</h4>
				    <p class="small mt-0">Operations Director</p>
				    <p class="card-text">Joe is the Operations Director at MovieTix! He ensures that the all movie screenings go according to plan, and provide logistical support for you to host your event! If you have any problems, he is here to help!</p>
				  </div>
				  <div class="card-body">
				    <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a>
				  </div>
				</div>
    		</div>
    		<div class="col-sm-3">
    			<div class="card">
				  <img class="card-img-top" src="/images/team-4.jpg" alt="">
				  <div class="card-body">
				    <h4 class="card-title mb-0 text-main">Anderson Martin</h4>
				    <p class="small mt-0">Communications Manager</p>
				    <p class="card-text">Anderson is the Communications Manager at MovieTix. He sees to the daily operations of this page, and also ensures that all queries are being replied to promptly!</p>
				  </div>
				  <div class="card-body">
				    <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a>
				  </div>
				</div>
    		</div>
    	</div>
    	<h4 class="text-center mt-5">Our Testimonies</h4>
    	<p class="text-center text-muted mb-4">Here are what users of MovieTix have to say regarding our service!</p>
		<blockquote class="blockquote mb-4">
		  <p class="mb-0 text-muted">"An excellent service! I am so impressed by the range of movies offered by MovieTix!"</p>
		  <footer class="blockquote-footer">John Lewis, UCL Student, MovieTix User for 2 years</footer>
		</blockquote>
		<blockquote class="blockquote mb-4">
		  <p class="mb-0 text-muted">"My friends and I attended a screening in August 2015 and we absolutely how it was organised!"</p>
		  <footer class="blockquote-footer">Samina Uma, new user of MovieTix</footer>
		</blockquote>
		<blockquote class="blockquote">
		  <p class="mb-0 text-muted">"Amazing! I have managed to organise 5 different events for fellow student over the past 6 months." </p>
		  <footer class="blockquote-footer">Chang Tan, UCL Student, MovieTix User for 6 months</footer>
		</blockquote>
    </div>
    <div class="row bg-info" style="height: 220px;">
    	<div class="text-center">
	    	<h4 class="text-uppercase text-center text-white">So What DO You Think</h4>
	    	<div class="col-sm-7 mx-auto">
	    		<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,
				possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
			</div>
			<a href="#" class="btn btn-light btn-md">CONTACT WITH ME</a>
		</div>

    </div>

</section>
@endsection