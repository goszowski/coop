@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            @yield('admin')
        </div>
    </div>
@endsection
