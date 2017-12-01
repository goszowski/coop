@extends('layouts.resources')

@section('body-class', 'bg-primary')

@section('app')

	<div class="center-wrapper">
		<div class="center-content">
			<div class="row no-m">
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<div class="pb15">
						<div class="pb15">
							<img src="{{ asset('images/logo-lg.png') }}" class="img-responsive center-block" style="max-width: 100px">
						</div>
					</div>
					<section class="panel bg-white no-b">
						<div class="p15">
							@yield('content')
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	

@endsection