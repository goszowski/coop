@extends('layouts.backend')

@section('content')

	@if(!count($products))
		<div class="alert alert-info">В цій категорії немає товарів</div>
	@else
		<div class="row">
			@foreach($products as $k=>$product)
				<div class="col-lg-3">
					{{ $product->name }}
				</div>
			@endforeach
		</div>

		{!! $products->links() !!}
	@endif

@endsection
