@extends('./components/layoutdokter')
@section('content')

@section('title', 'Welcome!')

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <h1 class="text-3xl underline font-quicksand text-solidblue font-bold">
    Hello world!
  </h1>
</body>
</html>

@endsection