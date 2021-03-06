@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Deliveryaddresses</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/delivery-addresses/create') }}" class="btn btn-success btn-sm" title="Створити DeliveryAddress">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/delivery-addresses', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Пошук..." value="{{request('search')}}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/>
                    <div class="table-responsive" style="width: 100%;">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th><th>User Id</th><th>Area Id</th><th>Address</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryaddresses as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td><td>{{ $item->area->present()->fullName }}</td><td>{{ $item->address }}</td>
                                    <td>
                                        <a href="{{ url('/admin/delivery-addresses/' . $item->id) }}" title="View DeliveryAddress"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Переглянути</button></a>
                                        <a href="{{ url('/admin/delivery-addresses/' . $item->id . '/edit') }}" title="Edit DeliveryAddress"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редагувати</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/delivery-addresses', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Видалити', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Видалити DeliveryAddress',
                                                    'onclick'=>'return confirm("Дійсно видалити?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $deliveryaddresses->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
