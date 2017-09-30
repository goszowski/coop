<!doctype html>
<html class="no-js" lang="">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- /meta -->

  <title>Sublime - Web Application Admin Dashboard</title>

  <!-- page level plugin styles -->
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/sublime.css') }}">
  <!-- endbuild -->

  <style>
    .text-white {color: #fff!important;}
  </style>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- load modernizer -->
  <script src="{{ asset('vendor/modernizr.js') }}"></script>
</head>
<!-- body -->

<body class="@yield('body-class')">
  @yield('app')

  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/slimScroll/jquery.slimscroll.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.js') }}"></script>
  <script src="{{ asset('vendor/jquery_appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('vendor/jquery.placeholder.js') }}"></script>
  <script src="{{ asset('vendor/fastclick/lib/fastclick.js') }}"></script>
  <!-- endbuild -->

  <!-- page level scripts -->
  <!-- /page level scripts -->

  <!-- template scripts -->
  <script src="{{ asset('scripts/offscreen.js') }}"></script>
  <script src="{{ asset('scripts/main.js') }}"></script>
  <!-- /template scripts -->

  <!-- page script -->
  <!-- /page script -->

</body>
<!-- /body -->

</html>
