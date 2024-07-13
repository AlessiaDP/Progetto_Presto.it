<x-layout>
	<div class="container-fluid">
		<div class="row py-5 justify-content-center align-items-center text-center">
			<div class="col-12">
				<h1 class="display-4">{{__('ui.searchResults')}} "<span class="fst-italic">{{ $query }}</span>"</h1>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pb-5">
			@forelse ($products as $product)
			<div class="col-12 col-lg-3 m-4">
				<x-card
				:product="$product"
				:category="$product->category"/>
			</div>
			@empty
			<div class="row justify-content-center">
				<div class="col-12 col-lg-5 m-4">
					<p class="alert alert-warning text-center">{{__('ui.noProdSearch')}}</p>
				</div>
			</div>
			<div class="row justify-content-center pb-5">
				<div class="col-12 col-lg-4 text-center">
					<a href="{{ route('productCreate') }}">
						<button class="btn btn-dark text-or">{{__('ui.productCreate')}}</button>
					</a>
				</div>
			</div>
			@endforelse
		</div>
	</div>
</x-layout>