@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product #{{ $product->id }}</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/products') }}" title="Назад"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($product, [
                        'method' => 'PATCH',
                        'url' => ['/admin/products', $product->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('admin.products.form', ['submitButtonText' => 'Зберегти'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
