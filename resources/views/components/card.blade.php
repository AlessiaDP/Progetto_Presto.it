<div style="margin-bottom:50px;">
    <div class="card-sl d-flex flex-column h-100">
        <div class="card-image card-image-prod position-relative">
            <div class="card-image card-image-prod position-relative ratio ratio-1x1">
                <img src="{{ $product->images->isNotEmpty() ? $product->images->first()->getUrl(300, 300) : 'https://picsum.photos/300/300' }}"
                alt="Immagine prodotto {{ $product->title }}" class="w-100 imgCard" height="300px" />
            </div>

            @if (Auth::check())
            @php
            $user = Auth::user();
            @endphp

            @if ($user->hasFavorite($product))
            <div id="favorite-section" class="card-action card-action-prod position-absolute top-0 end-0 m-2">
                <form action="{{ route('removeFavorite', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fas fa-heart fa-lg text-danger"></i>
                    </button>
                </form>
            </div>
            @else
            <div id="favorite-section" class="card-action card-action-prod position-absolute top-0 end-0 m-2">
                <form action="{{ route('addFavorite', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fa-regular fa-lg fa-heart text-danger"></i>
                    </button>
                </form>
            </div>
            @endif
            @endif
        </div>

        <div class="flex-grow-1 d-flex flex-column">
            <div class="card-heading card-heading-prod pb-0">
                <p class="titleCard">{{ $product->title }}</p>
            </div>

            <div class="card-text card-text-prod pt-0">
                <p class="display-6 priceCard mb-0">€ {{ $product->price }}</p>
            </div>

            <div class="card-text card-text-prod">
                {{ $product->getDet() }}
            </div>

            @if ($product->category)
            <div class="card-text card-text-prod fst-italic">
                {{ __('ui.category') }}:
                <a
                href="{{ route('byCategory', $product->category) }}">{{ __('ui.' . $product->category->name) }}</a>
            </div>
            @endif

            @if ($product->user)
            <div class="card-text card-text-prod fst-italic">
                {{ __('ui.createdBy') }}:
                <a href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a>
            </div>
            @endif

            <div class="mt-auto">
                <a href="{{ route('productShow', $product) }}" class="card-button card-button-prod">
                    {{ __('ui.details') }}</a>
                </div>
            </div>
        </div>
    </div>
