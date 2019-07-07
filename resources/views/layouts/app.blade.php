<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('stisla/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('stisla/css/components.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @guest
        <main class="py-4">
            @yield('content')
        </main>
        @else
        <div class="main-wrapper">
          @include('layouts.nav')
          @include('layouts.sidebar')
          <div class="main-content" style="min-height: 725px;">
            <section class="section">
              @if( !Request::is('ticket') )
              <div class="section-header">
              <h1>{{ $title }}</h1>
            </div>
            @endif
              @yield('content')
            </section>
            </div>
      </div>
        @endguest
    </div>
</body>
</html>
