@if(!request('ajax'))

@extends('layouts.resources')

@section('app')
<div class="cover"></div>
  <div class="overlay bg-color"></div>
  <div class="app horizontal-layout">
    <!-- top header -->
    <header class="header header-fixed navbar">
      <div class="container">
        <div class="brand" style="padding-left: 15px;">
          <!-- toggle offscreen menu -->
          <a href="javascript:;" class="ti-menu navbar-toggle off-left visible-xs" data-toggle="collapse" data-target="#hor-menu"></a>
          <!-- /toggle offscreen menu -->

          <!-- logo -->
          <a href="{{ url('/') }}" class="navbar-brand ripple-white" data-ajax="true">
            <img src="{{ asset('images/logo.png') }}" style="margin-top: 0!important;" alt="coop">
          </a>
          <!-- /logo -->
        </div>

        <div class="collapse navbar-collapse pull-left" id="hor-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="javascript:;" data-toggle="dropdown" class="ripple-white">
                <span>Асортимент</span>
                <b class="caret"></b>
              </a>
              @include('partials.menus.dropdown', ['categories'=>$categories])
            </li>
            <li class="dropdown">
              <a href="javascript:;" data-toggle="dropdown" class="ripple-white">
                <span>Замовлення</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="small_menu.html">
                    <span>Нове замовлення</span>
                  </a>
                </li>
                <li>
                  <a href="right_menu.html">
                    <span>Мої замовлення</span>
                  </a>
                </li>
                <li>
                  <a href="push_sidebar.html">
                    <span>Усі замовлення</span>
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </div>


        <ul class="nav navbar-nav navbar-right">

          @if(Auth::user())
            <li class="off-right">
              <a href="javascript:;" data-toggle="dropdown" class="ripple-white">
                <span>{{ Auth::user()->name }}</span>
                <i class="ti-angle-down ti-caret"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="javascript:;">Settings</a>
                </li>
                <li>
                  <a href="javascript:;">Upgrade</a>
                </li>
                <li>
                  <a href="javascript:;">
                    <div class="badge bg-danger pull-right">3</div>
                    <span>Notifications</span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">Help</a>
                </li>
                <li>
                  <a href="{{ url('/logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          @else 
            <li class="off-right">
              <a href="{{ route('login') }}" class="ripple-white">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span class="hidden-xs"> Вхід</span>
              </a>
            </li>
          @endif
          


        </ul>
      </div>
    </header>
    <!-- /top header -->

    <section class="layout">

      <!-- main content -->
      <section class="main-content">

        <!-- content wrapper -->
        <div class="content-wrap">

          <!-- inner content wrapper -->
          <div class="wrapper">

              <div class="container">
                <div id="app">
                  @endif

                  @yield('content')

                  @if(!request('ajax'))
                </div>
              </div>

          </div>
          <!-- /inner content wrapper -->

        </div>
        <!-- /content wrapper -->
        <a class="exit-offscreen"></a>
      </section>
      <!-- /main content -->

    </section>

  </div>
@endsection

@endif