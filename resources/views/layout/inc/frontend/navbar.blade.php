<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <a class="navbar-brand" href="{{ url('/') }}">AI Travel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto"> <!-- Centered menu items -->
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('trip-planner') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/trip-planner') }}">Trip Planner</a>
            </li>
            @auth
            <li class="nav-item {{ Request::is('myPlans') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/my-plans') }}">My Plans</a>
            </li>
            @endauth
            <li class="nav-item {{ Request::is('discover') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/discover') }}">Discover</a>
            </li>
            <li class="nav-item {{ Request::is('help') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/help') }}">Help</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center"> <!-- Right-aligned menu items -->
            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/profile') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ url('/profile/edit') }}">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </li>            
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>        
    </div>
</nav>