@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Пароль" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="show">
        <div class="pull-right" style="position: relative; z-index: 2;">
            <a href="{{ route('password.request') }}">
                Відновити пароль
            </a>
        </div>

        <label class="checkbox">
            <input type="checkbox" name="remember" checked> Запам'ятати мене
        </label>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block ripple-white">
        Увійти
    </button>

    
</form>
@endsection
