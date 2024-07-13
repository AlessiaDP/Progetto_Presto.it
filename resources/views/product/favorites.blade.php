<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">{{__('ui.favoriteList')}}</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			@if (session('aggiuntoPreferito'))
			<div id="success-alert" class="alert alert-success">{{ session('aggiuntoPreferito') }}</div>
			@endif
			@if (session('rimossoPreferito'))
			<div id="success-alert" class="alert alert-warning">{{ session('rimossoPreferito') }}</div>
			@endif
			@if (session('message'))
			<div id="success-alert" class="alert alert-info">{{ session('message') }}</div>
			@endif
		</div>
	</div>

	<div class="container my-5">
		<div class="row justify-content-center">
			@foreach($products as $product)
			@if ($product->is_approved == 1)
			<div class="col-12 col-md-3 m-4">
				<x-card
				:product="$product"
				:category="$product->category"/>
			</div>
			@endif
			@endforeach

			@if (count($products) == 0)
			<div class="row justify-content-center">
				<div class="col-12 col-md-5 m-4">
					<p class="alert alert-warning text-center">{{__('ui.noProdFavorite')}}</p>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 col-md-4 text-center">
					<a href="{{ route('productIndex') }}">
						<button class="btn btn-dark text-or">{{__('ui.addProdFavorite')}}</button>
					</a>
				</div>
			</div>
			@endif
		</div>
	</div>

</x-layout>
