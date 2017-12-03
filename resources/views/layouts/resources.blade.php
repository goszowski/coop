@if(!request('ajax'))<!doctype html>
<html class="no-js" lang="">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- /meta -->

  <title>Укркоопспілка</title>


  {!! Minify::stylesheet([
      '/vendor/select2/dist/css/select2.min.css',
      '/vendor/bootstrap/dist/css/bootstrap.min.css',
      '/vendor/jripple/ripple.css',
      '/vendor/pace/pace.css',
      '/vendor/toastr/toastr.min.css',
      '/styles/font-awesome.css',
      '/styles/themify-icons.css',
      '/styles/animate.css',
      '/styles/sublime.css',
  ]) !!}

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
  @endif

  @yield('app')

  @if(!request('ajax'))



  {!! Minify::javascript([
      '/vendor/jquery/dist/jquery.js',
      '/vendor/bootstrap/dist/js/bootstrap.js',
      '/vendor/jripple/ripple.min.js',
      '/vendor/pace/pace.js',
      '/vendor/toastr/toastr.min.js',
      '/vendor/ajax-navigation/ajax-navigation.js',
      '/vendor/particleground/jquery.particleground.min.js',
      '/vendor/jquery.easing/jquery.easing.js',
      '/vendor/jquery_appear/jquery.appear.js',
      '/vendor/jquery.placeholder.js',
      '/vendor/fastclick/lib/fastclick.js',
      '/vendor/select2/dist/js/select2.min.js',
      '/vendor/select2/dist/js/i18n/'.config('app.locale').'.js',
      '/scripts/offscreen.js',
      '/scripts/main.js',
      '/vendor/preventDoubleSubmission/preventDoubleSubmission.js',
  ]) !!}

  <script>
    $(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function buildPage()
      {
        $('[data-toggle="dropdown"]').parent().removeClass('open');
        $('form').preventDoubleSubmission();

        setTimeout(function() {
          $('.ripple-white, .ripple-dark').find('.ink').remove();
        }, 500);

        $('.ripple-white').ripple({
          color:'rgba(255, 255, 255, 0.3)',
          time:'.5s'
        });

        $('.ripple-dark').ripple({
          color:'rgba(0, 0, 0, 0.3)',
          time:'.5s'
        });

        $('.particles').particleground({
          dotColor: 'rgba(255, 255, 255, 0.3)',
          lineColor: 'rgba(255, 255, 255, 0.1)',
          lineWidth: 1,
          particleRadius: 5,
          parallax: false,
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
      }

      var navigation = new AjaxNavigation();
      navigation.onPageLoad(function() {
        buildPage();
      });

      buildPage();
    });
  </script>

  <!-- page script -->
  @yield('scripts')
  <!-- /page script -->

</body>
<!-- /body -->

</html>
@endif