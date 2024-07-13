<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">{{__('ui.allProductsOf')}} {{$user->name}}</h1>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row justify-content-center">
			@foreach($user->products as $product)
			@if ($product->is_approved == 1)
			<div class="col-12 col-md-3 m-4">
				<x-card
				:product="$product"
				:category="$product->category"
				:user="$product->user"/>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</x-layout>
