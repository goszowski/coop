@extends('layouts.resources')

@section('body-class') bg-primary @endsection

@section('app')
<div class="center-wrapper">
    <div class="center-content text-center">
      <h1 class="text-uppercase"><b>Аккаунт ще не активовано</b></h1>
      <div class="mb25">Очікуйте активації адміністратором</div>
      <a class="btn btn-default" style="color: #000;" href="{{ url('/') }}"><i class="fa fa-home"></i> Перейти на головну</a> / <a class="btn btn-default" style="color: #000;" href="{{ url('/logout') }}"
	        onclick="event.preventDefault();
	                 document.getElementById('logout-form').submit();">
	        <i class="fa fa-sign-out"></i> Вийти з системи
	    </a>

	    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	        {{ csrf_field() }}
	    </form>
    </div>
</div>
@endsection