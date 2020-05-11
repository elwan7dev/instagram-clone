<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/services')}}">Services</a>
            </li>
          </ul>
          <form class="form-inline">
            <div class="search">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
            </div>
            
          </form>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <a href="{{ route('profile') }}" class="nav-link" title="Profile">
                    <li class="nav-item">
                      <img src="{{ asset('avatar.jpg') }}" width="20" height="20" class="d-inline-block align-middle" alt="user poto">
                        {{ Auth::user()->name }}
                        {{-- <a class="nav-link" title="Profile" href="{{ route('home') }}"></a> --}}
                    </li> 
                  </a>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Edit Profile</a>
                          <a class="dropdown-item" href="#">Settings</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>
