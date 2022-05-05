<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" id="show" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <button class="navbar-toggler" id="hide" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-times"></i>
      </button>
      <div class="collapse navbar-collapse bg-white" id="navbarNav">
        <ul class="navbar-nav" id="menu">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/orders">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('reservation') }}">Resevation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto" id="social-media">
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/card" id="card"><i class="fas fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profil " id="login">{{ Auth::user()->firstname }}  {{Auth::user()->lastname}}</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
                <button class="nav-link" id="login">Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}" id="login">Login / Register</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>
