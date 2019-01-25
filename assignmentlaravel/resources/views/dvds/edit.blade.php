<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse">
            <a class="navbar-brand" href="{{ url('/') }}">
                Home
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto col-md-11">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right ml-auto">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav>

        <main class="py-4">
            <div class="container">
              <h1 class="title">Edit DVD</h1>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="/dvds/{{ $dvd->id }}" method="POST" style="margin-bottom: 1em;">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-row">
                  <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="control-label" for="inputTitle">Title</label>
                    <input class="form-control" id="inputTitle" name="title" placeholder="Title" required value="{{ $dvd->title }}">
                  </div>
                  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label class="control-label" for="inputDescription">Description</label>
                    <input class="form-control" id="inputDescription" name ="description" placeholder="Description" required value="{{ $dvd->description }}">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update DVD</button>
              </form>

              <form action="/dvds/{{ $dvd->id }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete DVD</button>
              </form>
            </div>
        </main>
    </div>
</body>
</html>
