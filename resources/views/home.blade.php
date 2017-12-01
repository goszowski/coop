@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed odit cumque culpa. Non beatae nisi harum corrupti dignissimos vero atque sequi quod ad quo, obcaecati adipisci porro tempora soluta quia!</p>
@endsection
