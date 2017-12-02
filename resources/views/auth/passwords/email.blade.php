@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="form-group text-center">
        <b>Відновлення паролю</b>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control input-lg" name="email" placeholder="Email" value="{{ old('email') }}" autofocus required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">
        Надіслати посилання для відновлення
    </button>
</form>
@endsection

@section('scripts')
    @if (session('status'))
    <script>
        $(function() {
            toastr.success('{{ session('status') }}');
        });
    </script>
    @endif
@endsection