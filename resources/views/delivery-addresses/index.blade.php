@extends('layouts.backend')

@section('content')

	<div class="row">
		<div class="col-lg-8 col-lg-push-2">
			<div class="panel panel-default">
		
				<div class="panel-heading">
					<div class="pull-right">
						<a href="{{ route('app.delivery-addresses.create') }}" class="ripple-dark" data-ajax="true"><i class="fa fa-plus text-danger"></i> Нова адреса</a>
					</div>
					Адреси доставки
				</div>

				<div class="table-responsive">
					<table class="table">
						@foreach($deliveryaddresses as $address)
							<tr>
								<td>{{ $address->present()->fullName }}</td>
								<td class="text-right">
		                            <a href="{{ route('app.delivery-addresses.edit', $address) }}" class="btn btn-primary btn-xs ripple-white" data-ajax="true">
		                            	<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редагувати
		                            </a>
		                            &nbsp;
		                            {!! Form::open([
		                                'method'=>'DELETE',
		                                'url' => route('app.delivery-addresses.destroy', $address->id),
		                                'class' => 'display-inline'
		                            ]) !!}
		                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Видалити', array(
		                                        'type' => 'submit',
		                                        'class' => 'btn btn-danger btn-xs',
		                                        'title' => 'Видалити DeliveryAddress',
		                                        'onclick'=>'return confirm("Дійсно видалити цю адресу?")'
		                                )) !!}
		                            {!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
