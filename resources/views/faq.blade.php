@extends('layouts.master')

@section('content')
<section class="container">
    <div style="height: 120px;"></div>
    <h2 class="text-center jumbotron bg-info text-white">Frequently Asked Questions</h2>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <img src="/images/faq.jpg" class="img-fluid" style="height: 60%; width: 100%;">
        </div>
    </div>
    <h4>In this page, you will find all the help you need to understand how to navigate the MovieTix system. 
Please click on the relevant questions to collapse/hide the section(s)!</h4>
<h4>Categories Of Questions</h4>
<h5 class="mb-3 text-muted">Hosting and Creating An Event</h5>
<div class="mb-4">
    <h6  class="question">How do I create an event</h6>
    <p class="answer text-muted">You go to <a href="/event/create">create an event link</a></p>
</div>
<div class="mb-4">
    <h6  class="question">What information do I need to provide for the event description?</h6>
    <p class="answer text-muted">You provide the location, title of movie, duration, etc</p>
</div>
<div class="mb-4">
    <h6  class="question">How can I check the progress of ticket sales?</h6>
    <p class="answer text-muted">You click on see those attending next to the movie you are attending from your account.</p>
</div>
<h5 class="mb-3 text-muted">Choosing An Event to Attend</h5>
<div class="mb-4">
    <h6  class="question">How do I browse events to attend??</h6>
    <p class="answer text-muted">You go to browse events link from the navigation menu</p>
</div>
<div class="mb-4">
    <h6  class="question">Can I view all the list of event I am due to attend??</h6>
    <p class="answer text-muted">Yes</p>
</div>
<div class="mb-4">
    <h6  class="question">How can I obtain updates regarding the event nearer its date?</h6>
    <p class="answer text-muted">You go to my account and see your upcoming events. Also you will be sent an email when the event is drawing close</p>
</div>
<h5 class="mb-4">What Is Next?</h5>
<div class="mb-3">
    <h6  class="question"> How do I give my feedback?</h6>
    <p class="answer text-muted">When an event has occurred, there will be an option to leave a feedback and rating for that event.</p>
</div>
<div style="height: 400px;"></div>
</section>
@endsection