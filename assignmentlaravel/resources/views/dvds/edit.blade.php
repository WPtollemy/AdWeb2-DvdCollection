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
  <div class="container">
    <h1 class="title">Edit DVD</h1>
    <div id="demo">
      <form action="/dvds/{{ $dvd->id }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-row">
          <div class="form-group">
            <label for="inputTitle">Title</label>
            <input class="form-control" id="inputTitle" name="title" placeholder="Title" value="{{ $dvd->title }}">
          </div>
          <div class="form-group">
            <label for="inputDescription">Description</label>
            <input class="form-control" id="inputDescription" name ="description" placeholder="Description" value="{{ $dvd->description }}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update DVD</button>
      </form>
    </div>

  </div>
</body>
</html>
