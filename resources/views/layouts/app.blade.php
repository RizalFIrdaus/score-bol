<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="svg" type="image/x-svg" href="{{asset('logo.svg')}}">
    <script src="https://cdn.tailwindcss.com"></script>

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  @vite('resources/css/app.css')
  @livewireStyles
</head>
<body>

@include('layouts.navbar')
@yield('content')
@include('layouts.footer')

@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@yield('scripts')
</body>
</html>