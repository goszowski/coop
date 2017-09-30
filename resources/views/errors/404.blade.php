@extends('layouts.resources')

@section('body-class') bg-primary @endsection

@section('app')
<div class="center-wrapper">
    <div class="center-content text-center text-white">
        <div class="error-number">404</div>
      <div class="mb25">Сторінка не існує</div>
      <a class="btn btn-default" style="color: #000;" href="{{ url('/') }}"><i class="fa fa-home"></i> Перейти на головну</a>
    </div>
</div>
@endsection