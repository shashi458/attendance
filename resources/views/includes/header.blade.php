<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
    <!-- Logo -->
    <a href="{{ asset('images/image.png') }}" class="logo">
        <!-- logo -->
        <div class="logo-lg">
            <span class="light-logo"><img src="" alt="logo" style="height: 50px; width:80px;"></span>
            <span class="dark-logo"><img src="" alt="logo"></span>
        </div>
    </a>
    <!-- Authenticated User Name -->
    @auth
        &nbsp; &nbsp; &nbsp;<span class="text-white">{{ auth()->user()->name }}</span>
    @endauth
</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
					<i data-feather="menu"></i>
			    </a>
			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
		<ul class="nav navbar-nav">

			<!-- Current DateTime Display -->
			<li class="btn-group nav-item d-lg-flex d-none align-items-center">
				<p id="currentDateTime" class="mb-0 text-fade pr-10 pt-5"></p>
			</li>

			<!-- Fullscreen Toggle -->
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i data-feather="maximize"></i>
				</a>
			</li>

			<!-- Logout -->
			<li class="btn-group nav-item d-lg-inline-flex">
				<form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
					@csrf
				</form>
				<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
				   class="nav-link waves-effect waves-light"
				   data-toggle="tooltip" data-placement="top" title="Logout">
					<i data-feather="log-out"></i>
				</a>
			</li>

		</ul>
	</div>

    </nav>
  </header>
