<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'Користувас', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="user_id" class="form-control" id="user_id" data-api-route="{{ route('api.user.find-by-email') }}" data-api-token="{{ api_token() }}">
            
            @if(isset($deliveryaddress) and $deliveryaddress->user)
                <option value="">---</option>
                <option selected value="{{ $deliveryaddress->user->id }}">{{ $deliveryaddress->user->email }} ({{ $deliveryaddress->user->name }})</option>
            @else
                <option selected value="">---</option>
            @endif

        </select>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('area_id') ? 'has-error' : ''}}">
    {!! Form::label('area_id', 'Район', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="area_id" class="form-control" id="area_id" data-api-route="{{ route('api.area.find-by-name') }}" data-api-token="{{ api_token() }}">
            
            @if(isset($deliveryaddress) and $deliveryaddress->area)
                <option value="">---</option>
                <option selected value="{{ $deliveryaddress->area->id }}">{{ $deliveryaddress->area->present()->fullName }}</option>
            @else
                <option selected value="">---</option>
            @endif

        </select>
        {!! $errors->first('area_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
