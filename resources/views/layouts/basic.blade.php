<!DOCTYPE html>
<html class="h-100 no-touch">
<head>
<meta charset="UTF-8"/>
<title>Car Rental</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column h-100 bg-light">

<div class="container d-flex flex-column flex-grow-1 my-4">
    @yield('content')
</div>

<footer class="footer mt-auto py-3">
  <div class="container text-center">
    <span class="text-muted">Copyright © {{ date("Y") }}</span>
  </div>
</footer>

<script src="hide-falsh-message.js"></script>

</body>
</html>