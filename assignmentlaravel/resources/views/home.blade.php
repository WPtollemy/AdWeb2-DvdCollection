<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container" style="padding-top: 1em;">
    <div class="row">
      <div class="col-sm-6">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Add DVD</button>
        <div id="demo" class="collapse">
          <form action="/create" method="POST">
            {{ csrf_field() }}
    
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTitle">Title</label>
                <input class="form-control" id="inputTitle" name="title" placeholder="Title">
              </div>
              <div class="form-group col-md-6">
                <label for="inputDescription">Description</label>
                <input class="form-control" id="inputDescription" name ="description" placeholder="Description">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    
      <div class="col-sm-6">
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
          <td>
            <a href="{{ url('/dvds/' . $dvd->id . '/edit') }}" class="btn btn-default">Edit</a>
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
