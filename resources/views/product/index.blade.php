<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.allProducts') }}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @if (@session('prodottoCaricato'))
                <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                    {{ session('prodottoCaricato') }}
                </div>
            @endif
            @foreach ($products as $product)
                <div class="col-12 col-lg-3 m-4">
                    <x-card :product="$product" :category="$product->category" />
                </div>
            @endforeach
            @if (count($products) == 0)
                <div class="col-12 col-md-5 m-4">
                    <p class="alert alert-warning text-center">{{ __('ui.noProdForSale') }}</p>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-12 col-md-4 text-center">
                        <a href="{{ route('productCreate') }}">
                            <button class="btn btn-dark text-or">{{ __('ui.firstProduct') }}</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-layout>
