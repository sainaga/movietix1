<header class="">
	<nav class="navbar fixed-top bg-white w-100">
		<a class="navbar-brand mt-4 ml-5" href="/"><img src="/images/MovieTixLogo.png"></a>
		<ul class="nav navbar-nav list-unstyled d-none d-sm-flex flex-row">
			<li class="ml-auto pr-3"><a href="/home" class="text-dark text-uppercase">Home</a></li>
			@if(Auth::check())
				@if(checkPermission(['admin']))
				<li class=" pr-3"><a href="/genre/create" class="text-dark text-uppercase">Create Genre</a></li>
				<li class=" pr-3"><a href="/language/create" class="text-dark text-uppercase">Create Language</a></li>
				@endif
			@endif
			@if(Auth::check())
				<li class=" pr-3"><a href="/event/create" class="text-dark text-uppercase">Create Event</a></li>
				<li class=" pr-3"><a href="/browse/events" class="text-dark text-uppercase">Browse Events</a></li>
			@endif
			<li class=" pr-3"><a href="/about" class="text-dark text-uppercase">About Us</a></li>
			<li class=" pr-3"><a href="/faq" class="text-dark text-uppercase">Frequently Asked Questions</a></li>
			@if(Auth::check())
			<li class=" pr-3"><a href="/account/{{Auth::user()->username}}/myevents" class="text-dark text-uppercase">My Account </a></li>
			<li class="dropdown d-none">
		        <a class="dropdown-toggle text-dark text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          My Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Action</a>
		        </div>
		      </li>
			
			<li class=" pr-3">
				 <a href="{{ route('logout') }}"  
	                onclick="event.preventDefault();
	                         document.getElementById('logout-form').submit();" class="text-dark text-uppercase">
	                Logout
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                {{ csrf_field() }}
	            </form>
			</li>
			@endif
		</ul>
	</nav>
</header>