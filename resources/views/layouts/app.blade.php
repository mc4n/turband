<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

<link href="{{ asset('/css/app.css') }}" rel="stylesheet" />


<title>@yield('title', 'Turban')</title>
</head>
<body>


<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
<div class="container">

<a class="navbar-brand" href="{{ route('home.index') }}">Turban</a>


<form class="form-inline my-2 my-lg-0" action="/search" method="get">
<div class="input-group">
  <input name="term" class="form-control input-lg" type="term" placeholder="Aramak için bir kelime girin" aria-label="Search">
  <button class="btn btn-success" type="submit">Ara</button>
 </div>
</form>


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>




<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

<div class="navbar-nav ms-auto">
<a class="nav-link active" href="{{ route('home.index') }}">Anasayfa</a>
<a class="nav-link active" href="{{ route('home.about') }}">Hakkında</a>
</div>
</div>
</div>
</nav>
<header class="masthead bg-primary text-white text-center py-4">
<div class="container d-flex align-items-center flex-column">
<h2>@yield('subtitle', 'Turkce Halk Sozlugu')</h2>
</div>
</header>
<!-- header -->
<div class="container my-4">
@yield('content')
</div>

<!-- footer -->
<div class="copyright py-4 text-center text-white">
<div class="container">
<small>
Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
href="#">
Turban</small>
</div>
</div>
<!-- footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
</body>
</html>


