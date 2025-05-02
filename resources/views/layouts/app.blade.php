<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'F1 Timing')</title>
  <!-- aquí tus CSS, p.ej. -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="p-4">
    @yield('content')
  </div>
  <!-- aquí tus JS, p.ej. -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>