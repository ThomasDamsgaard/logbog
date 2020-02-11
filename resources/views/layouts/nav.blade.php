@if (Route::is('frontpage'))
<nav class="navbar navbar-expand-md navbar-light fixed-top">
@else
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
@endif
  <div class="container">

    @if (Auth::user())
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">MiniCEX</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('activity') }}">Aktivitetsniveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('inflict.index') }}">Tilføj</a>
        </li>
      </ul>
    @endif

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
      @if(Auth::guard('web')->check())
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->firstname . ' ' . Auth::user()->lastname}} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Log ud') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>

      @elseif(Auth::guard('admin')->check())
        <li class="nav-item dropdown">
          <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('admin')->user()->firstname }} (Admin) <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
              Logout
            </a>
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin') }}</a>
        </li>
      @endif
    </ul>
  </div>
</nav>
