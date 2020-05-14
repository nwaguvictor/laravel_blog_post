<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Dashboard | @yield('title', 'Home')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('../partials.dashboard-nav')

          <div class="container my-3">
              @yield('content')
          </div>

          <script src="{{asset('js/app.js')}}"></script>
          
          @yield('scripts')
    </body>
</html>