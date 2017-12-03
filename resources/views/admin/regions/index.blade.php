@extends('layouts.backend')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Regions</div>
                <div class="panel-body">
                    <a href="{{ url('/admin/regions/create') }}" class="btn btn-success btn-sm" title="Створити Region">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/regions', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                    <th>ID</th><th>Name</th><th>Ordering</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($regions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(['route'=>['admin.regions.move.up', $item], 'method'=>'patch', 'style'=>'display: inline']) !!}
                                                <button class="btn btn-xs btn-default ripple-dark"><i class="fa fa-angle-up"></i></button>
                                            {!! Form::close() !!}

                                            {!! Form::open(['route'=>['admin.regions.move.down', $item], 'method'=>'patch', 'style'=>'display: inline']) !!}
                                                <button class="btn btn-xs btn-default ripple-dark"><i class="fa fa-angle-down"></i></button>
                                            {!! Form::close() !!}

                                            &nbsp;

                                            {!! Form::open(['route'=>['admin.regions.move.start', $item], 'method'=>'patch', 'style'=>'display: inline']) !!}
                                                <button class="btn btn-xs btn-default ripple-dark"><i class="fa fa-angle-double-up"></i></button>
                                            {!! Form::close() !!}

                                            {!! Form::open(['route'=>['admin.regions.move.end', $item], 'method'=>'patch', 'style'=>'display: inline']) !!}
                                                <button class="btn btn-xs btn-default ripple-dark"><i class="fa fa-angle-double-down"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/regions/' . $item->id) }}" title="View Region"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Переглянути</button></a>
                                        <a href="{{ url('/admin/regions/' . $item->id . '/edit') }}" title="Edit Region"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редагувати</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/regions', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Видалити', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Видалити Region',
                                                    'onclick'=>'return confirm("Дійсно видалити?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $regions->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
