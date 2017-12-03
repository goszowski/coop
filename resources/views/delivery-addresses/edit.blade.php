@extends('layouts.backend')

@section('content')

	<div class="row">
		<div class="col-lg-8 col-lg-push-2">
			<div class="panel panel-default">
		
				<div class="panel-heading">
					Редагування адреси доставки
				</div>

				<div class="panel-body">
					{!! Form::model($deliveryaddress, ['url'=>route('app.delivery-addresses.update', $deliveryaddress), 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}

						@include('delivery-addresses.form')

						<div class="form-group">
							<div class='col-md-offset-4 col-md-4'>
								<button type="submit" class="btn btn-primary ripple-white">Зберегти адресу</button>
							</div>
						</div>

					{!! Form::close() !!}
					</div>
				</div>
		</div>
	</div>

@endsection
