<!DOCTYPE html>
<html class="h-100 no-touch">
<head>
<meta charset="UTF-8"/>
<title>Car Rental</title>
<link href = {{ asset("/css/app.css") }} rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 bg-light">

<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">LaraCarRental</a>
      <ul class="navbar-nav mb-2 mb-md-0 ml-auto mr-3">
        <li class="nav-item{{ (request()->is('/')) ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item{{ (request()->is('rental*')) ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('rental.index') }}">Rentals</a>
        </li>
        <li class="nav-item{{ (request()->is('vehicle*')) ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('vehicle.index') }}">Vehicles</a>
        </li>
        <li class="nav-item{{ (request()->is('customer*')) ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('customer.index') }}">Customers</a>
        </li>
      </ul>
      <div>
      <span class="text-light mx-2">
        Logged as: <b>{{ Auth::user()->name }}</b> ({{ Auth::user()->email }})
      </span>
      <a href="{{ route('login.logout') }}" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </nav>
</header>

<div class="container d-flex flex-column flex-grow-1 my-4">
    @yield('content')
</div>

<footer class="footer mt-auto py-3 bg-white">
  <div class="container">
    <span class="text-muted">Copyright © {{ date("Y") }}</span>
  </div>
</footer>

<script src="hide-falsh-message.js"></script>

</body>
</html>