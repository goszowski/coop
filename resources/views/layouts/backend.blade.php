@extends('layouts.resources')

@section('app')
<div class="cover"></div>
  <div class="overlay bg-color"></div>
  <div class="app horizontal-layout boxed">
    <!-- top header -->
    <header class="header header-fixed navbar">

      <div class="brand">
        <!-- toggle offscreen menu -->
        <a href="javascript:;" class="ti-menu navbar-toggle off-left visible-xs" data-toggle="collapse" data-target="#hor-menu"></a>
        <!-- /toggle offscreen menu -->

        <!-- logo -->
        <a href="{{ url('/') }}" class="navbar-brand">
          <img src="{{ asset('images/logo.png') }}" style="margin-top: 0;" alt="coop">
        </a>
        <!-- /logo -->
      </div>

      <div class="collapse navbar-collapse pull-left" id="hor-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="javascript:;" data-toggle="dropdown">
              <span>Асортимент</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              @foreach($categories as $category)
                <li>
                  <a href="small_menu.html">
                    <span>{{ $category->name }}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown">
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
          <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown">
              <span>Інформація</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="mail.html">
                  <span>Mailbox</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="javascript:;">
              <span>Доставка і оплата</span>
            </a>
          </li>

          <li class="dropdown">
            <a href="javascript:;">
              <span>Аналітика</span>
            </a>
          </li>

          <li class="dropdown">
            <a href="javascript:;">
              <span>Контакти</span>
            </a>
          </li>
        </ul>
      </div>


      <ul class="nav navbar-nav navbar-right">

        @if(Auth::user())
          <li class="off-right">
            <a href="javascript:;" data-toggle="dropdown">
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
            <a href="{{ route('login') }}">
              <i class="fa fa-sign-in" aria-hidden="true"></i>
              <span class="hidden-xs">Вхід</span>
            </a>
          </li>
          <li class="off-right">
            <a href="{{ route('register') }}">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="hidden-xs">Реєстрація</span>
            </a>
          </li>
        @endif
        


      </ul>
    </header>
    <!-- /top header -->

    <section class="layout">

      <!-- main content -->
      <section class="main-content">

        <!-- content wrapper -->
        <div class="content-wrap">

          <!-- inner content wrapper -->
          <div class="wrapper">

              <ol class="breadcrumb"> <li> <a href="javascript:;"><i class="ti-home mr5"></i>Dashboard</a> </li> <li> <a href="javascript:;"><i class="ti-window mr5"></i>Tables</a> </li> <li class="active">Basic Table Elements</li> </ol>
            
              @yield('content')

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