<!doctype html>
<html class="no-js" lang="">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- /meta -->

  <title>Укркоопспілка</title>

  <!-- page level plugin styles -->
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/jripple/ripple.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/pace/pace.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('vendor/smartmenus/dist/addons/bootstrap/jquery.smartmenus.bootstrap.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/sublime.css') }}">
  <!-- endbuild -->

  <style>
    .text-white {color: #fff!important;}
    .dropdown-submenu {
  position: relative;
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: 0;
  /*margin-top: -6px;
  margin-left: -1px;*/
  /*-webkit-border-radius: 0 6px 6px 6px;
  -moz-border-radius: 0 6px 6px;
  border-radius: 0 6px 6px 6px;*/
}

.dropdown-submenu:hover>.dropdown-menu {
  display: block;
}

.dropdown-submenu>a:after {
  display: block;
  content: " ";
  float: right;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  border-left-color: #ccc;
  margin-top: 5px;
  margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
  border-left-color: #fff;
}

.dropdown-submenu.pull-left {
  float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}

  .particles {
    position: absolute;
    left: 0; right: 0;
    top: 0; bottom: 0;
    opacity: 0.2;
  }
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
  <script src="{{ asset('vendor/jripple/ripple.min.js') }}"></script>
  <script src="{{ asset('vendor/pace/pace.js') }}"></script>
  <script src="{{ asset('vendor/particleground/jquery.particleground.min.js') }}"></script>
  {{-- <script src="{{ asset('vendor/smartmenus/dist/jquery.smartmenus.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/smartmenus/dist/addons/bootstrap/jquery.smartmenus.bootstrap.min.js') }}"></script> --}}
  <script src="{{ asset('vendor/slimScroll/jquery.slimscroll.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.js') }}"></script>
  <script src="{{ asset('vendor/jquery_appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('vendor/jquery.placeholder.js') }}"></script>
  <script src="{{ asset('vendor/fastclick/lib/fastclick.js') }}"></script>
  <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/dist/js/i18n/'.config('app.locale').'.js') }}"></script>
  <!-- endbuild -->

  <!-- page level scripts -->
  <!-- /page level scripts -->

  <!-- template scripts -->
  <script src="{{ asset('scripts/offscreen.js') }}"></script>
  <script src="{{ asset('scripts/main.js') }}"></script>
  <!-- /template scripts -->

  <script>
    $(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('.ripple-white').ripple({
        color:'rgba(255, 255, 255, 0.3)',
        time:'.35s'
      });

      $('.particles').particleground({
        dotColor: '#5cbdaa',
        lineColor: '#5cbdaa'
      });


      $('[data-api-route]').each(function() {
        var item = $(this);
        var action = item.data('api-route') + '?api_token=' + item.data('api-token');

        item.select2({
            minimumInputLength: 3,
            language: '{{ config('app.locale') }}',
            ajax: {
              delay: 500,
              url: action,
              dataType: 'json',
              data: function (term, page) {
                return {
                  q: term
                }
              }
            }
        });
      });
    });
  </script>

  <!-- page script -->
  @yield('scripts')
  <!-- /page script -->

</body>
<!-- /body -->

</html>
