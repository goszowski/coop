@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">DeliveryAddress {{ $deliveryaddress->id }}</div>
                <div class="panel-body">

                    <a href="{{ url('/admin/delivery-addresses') }}" title="Назад"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                    <a href="{{ url('/admin/delivery-addresses/' . $deliveryaddress->id . '/edit') }}" title="Редагувати DeliveryAddress"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редагувати</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/deliveryaddresses', $deliveryaddress->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Видалити', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Видалити DeliveryAddress',
                                'onclick'=>'return confirm("Дійсно видалити?")'
                        ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $deliveryaddress->id }}</td>
                                </tr>
                                <tr><th> User Id </th><td> {{ $deliveryaddress->user_id }} </td></tr><tr><th> Area Id </th><td> {{ $deliveryaddress->area_id }} </td></tr><tr><th> Address </th><td> {{ $deliveryaddress->address }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
