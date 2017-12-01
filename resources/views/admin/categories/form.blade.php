<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{session('ajax_token')}}

<div class="form-group {{ $errors->has('parent_category_id') ? 'has-error' : ''}}">
    {!! Form::label('parent_category_id', 'Батьківська категорія', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="parent_category_id" class="form-control" id="parent_category_id" data-api-route="{{ route('api.category.find-by-name') }}" data-api-token="{{ api_token() }}">
        	
            @if(isset($category) and $category->parent)
                <option value="">---</option>
                <option selected value="{{ $category->parent->id }}">{{ $category->parent->present()->fullName }}</option>
            @else
                <option selected value="">---</option>
            @endif

        </select>
        {!! $errors->first('parent_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
