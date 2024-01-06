<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>

  @php 
  $routeName = request()->route()->getName();
  @endphp
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Mon Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a @class(['nav-link', 'active' =>  str_starts_with($routeName, 'index')]) aria-current="page" href="{{ route('blog.index')}}">Blog</a>
            </li>
            <li class="nav-item">
              <a @class(['nav-link', 'active' =>  str_starts_with($routeName, 'create')]) aria-current="page" href="{{ route('blog.create')}}">New Movie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">À propos</a>
            </li>
          </ul>
          <div class="navbar-nav ml-auto">
              @auth
                {{ Auth::user()->name }}
                <form class="nav-item" action="{{ route('auth.logout')}}" method="post">
                  @method("delete")
                  @csrf
                  <button class="text-dark">Se deconnecter</button>
                </form>
              @endauth

              @guest
              <div class="nav-item">
                <a class="nav-link" href="{{ route('auth.login')}}"> Se connecter</a>
              </div>                
              @endguest
          </div>
        </div>
      </nav>
    <div class="container">
      @if (session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
        
      @endif
        @yield('content')
    </div>
</body>
</html>