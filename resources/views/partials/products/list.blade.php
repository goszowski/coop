<ol class="breadcrumb"> 
	<li> 
		<a href="{{ url('/') }}" data-ajax="true">
			<i class="ti-home mr5"></i>
			Асортимент
		</a>
	</li>

	@if(isset($category))
		@foreach($category->breadcrumbs() as $breadcrumb)
			<li>
				<a href="{{ route('app.categories.show', $breadcrumb->slug) }}" data-ajax="true">
					<i class="ti-window mr5"></i>
					{{ $breadcrumb->name }}
				</a>
			</li>
		@endforeach
	@endif
</ol>

@if(!count($products))
	<div class="alert alert-info">В цій категорії немає товарів</div>
@else
	<div class="row">
		@foreach($products as $k=>$product)
			<div class="col-lg-4">
				<section class="panel panel-default">
					<div class="panel-body">
						<a href="javascript:;" class="pull-left mr15">
							<img src="http://mnogopak.ru/images/poleznaja_informacija-1.jpg" class="avatar avatar-md img-circle" alt="">
						</a>
						<div class="overflow-hidden">
							<b>{{ $product->name }}</b>
							<small class="show">{{ $product->category->present()->fullName }}</small>
							<div class="show"></div>
							<a href="javascript:;" class="btn btn-default btn-sm mt5">Додати до замовлення</a>
						</div>
					</div>
				</section>
			</div>
		@endforeach
	</div>

	{!! $products->links() !!}
@endif