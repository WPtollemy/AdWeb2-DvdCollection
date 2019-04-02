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
          <h1>DVD Sytem</h1>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div style="padding-top: 1em; padding-left: 1em;">
            <div class="row">
              <div class="col-sm-8">
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Add DVD</button>
                <div id="demo" class="collapse">
                  <form action="/dvds/create" method="POST" style="padding-bottom: 1em">
                    {{ csrf_field() }}

                    <div class="form-row">
                      <div class="form-group" style="padding-top: 1em">
                        <label for="inputTitle">Title</label>
                        <input class="form-control" id="inputTitle" name="title" placeholder="Title" required>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input class="form-control" id="inputDescription" name ="description" placeholder="Description" required>
                      </div>
                      <div class="form-group">
                        <label for="inputGenre">Genre</label>
                        <input class="form-control" id="inputGenre" name ="genre" placeholder="Genre" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                </div>
              </div>

              <div class="col-sm-4">
                <form action="/search">
                  {{ csrf_field() }}
                  <input class="text" id="searchTitle" name="searchTitle" placeholder="Title">
                  <button type="submit" class="btn btn-primary">Search</button>
                </form>
              </div>
            </div>
          </div>

          <div>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dvds as $dvd)
                  <tr>
                  <th scope="row">{{ $dvd->id }}</th>
                  <td>{{ $dvd->title }}</td>
                  <td>{{ $dvd->description }}</td>
                  <td>{{ $dvd->genre }}</td>
                  <td>
                    <a href="{{ url('/dvds/' . $dvd->id . '/edit') }}" class="btn btn-default">Edit</a>
                  </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $dvds->onEachSide(3)->links() }}
          </div>
          <div id="chart-div"></div>
          @donutchart('Films', 'chart-div')
        </main>
    </div>
</body>
</html>
