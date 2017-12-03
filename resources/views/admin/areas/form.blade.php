<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('region_id') ? 'has-error' : ''}}">
    {!! Form::label('region_id', 'Область', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="region_id" class="form-control" id="region_id" data-api-route="{{ route('api.region.find-by-name') }}" data-api-token="{{ api_token() }}">
            
            @if(isset($area) and $area->region)
                <option value="">---</option>
                <option selected value="{{ $area->region->id }}">{{ $area->region->name }}</option>
            @else
                <option selected value="">---</option>
            @endif

        </select>
        {!! $errors->first('region_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
