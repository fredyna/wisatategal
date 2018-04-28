{{-- navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">WISATA TEGAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @if($menu == 1)
          <li class="nav-item active">
            <a class="nav-link" href="/"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users"><i class="fas fa-users"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/wisata">Wisata</a>
          </li>
        @elseif($menu == 2)
          <li class="nav-item">
            <a class="nav-link" href="/"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/users"><i class="fas fa-users"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/wisata">Wisata</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users"><i class="fas fa-users"></i> Users</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/wisata">Wisata</a>
          </li>
        @endif
      </ul>
      <div class="btn-group btn-group-toggle">
        <a href="{{ route('login') }}" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</a>
      </div>
    </div>
  </nav>
  {{-- end navbar --}}
