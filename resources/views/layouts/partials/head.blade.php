@php
    $dir = App::environment('production') ? "public/" : "";
@endphp
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>@yield('title',  __('Persian Classic Products'))</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="{{ asset($dir . "front/assets/img/favicon.png") }}" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="{{ asset($dir . 'front/vendor/splide/splide.min.css') }}" rel="stylesheet" />
<link href="{{ asset($dir . 'front/css/styles.css') }}" rel="stylesheet" />

@yield('styles')
