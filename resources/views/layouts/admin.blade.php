<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Admin | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        @include('../partials.admin-nav')

          <div class="container">
              @yield('content')
          </div>

          <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>