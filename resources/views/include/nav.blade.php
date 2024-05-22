<nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('projects.index')}}">Progetti</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('projects.create')}}">Aggiungi progetto</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="{{route('projects.index')}}">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0 text-white ms-1 align-items-center">
            @auth
                <li class="ms-1">Bentornato, {{Auth::user()->name}}!</li>
              <form method="post" action="{{route('logout')}}">
                @csrf
                  <button class="nav-link">Logout</button>
              </form>
              @else
              <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
              <li><a href="{{route('register')}}" class="nav-link">Registrati</a></li>
              @endauth
        </ul>
      </div>
    </div>
  </nav>