<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Батьківська категорія', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="category_id" class="form-control" id="category_id" data-api-route="{{ route('api.category.find-by-name') }}" data-api-token="{{ api_token() }}">
            
            @if(isset($product) and $product->category)
                <option value="">---</option>
                <option selected value="{{ $product->category->id }}">{{ $product->category->present()->fullName }}</option>
            @else
                <option selected value="">---</option>
            @endif

        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('count_in_pack') ? 'has-error' : ''}}">
    {!! Form::label('count_in_pack', 'Count In Pack', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('count_in_pack', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('count_in_pack', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Створити', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
