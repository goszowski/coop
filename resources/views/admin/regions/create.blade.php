@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Region</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/regions') }}" title="Назад"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/admin/regions', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('admin.regions.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
