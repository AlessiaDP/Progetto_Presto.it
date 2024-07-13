<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $product->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="row border shadow rounded p-5">
            <div class="col-12 col-lg-5">

                {{-- ! inizio carosello --}}
                <div id="carouselShow" class="carousel slide carousel-fade mx-auto">

                    {{-- ? inizio sezione con le MINIATURE --}}
                    <div class="carousel-indicators">
                        @if ($product->images->count())
                        @foreach ($product->images as $key => $image)
                        <img src="{{ Storage::url($image->path) }}"
                        alt="Immagine {{ $key + 1 }} del prodotto {{ $product->title }}"
                        data-bs-target="#carouselShow" data-bs-slide-to="{{ $key }}"
                        @if ($key == 0) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $key + 1 }}">
                        @endforeach
                        @else
                        @for ($i = 0; $i < 3; $i++)
                        <img src="https://picsum.photos/1000"
                        alt="Immagine segnaposto del prodotto {{ $product->title }}"
                        data-bs-target="#carouselShow" data-bs-slide-to="{{ $i }}"
                        @if ($i == 0) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $i + 1 }}">
                        @endfor
                        @endif
                    </div>
                    {{-- ? fine sezione con le MINIATURE --}}

                    {{-- ? inizio sezione con le immagini --}}
                    <div class="carousel-inner rounded">
                        @if ($product->images->count())
                        @foreach ($product->images as $key => $image)
                        <div class="carousel-item @if ($key == 0) active @endif" height="300px" width="300px">
                            <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                            alt="Immagine {{ $key + 1 }} del prodotto {{ $product->title }}">
                        </div>
                        @endforeach
                        @else
                        @for ($i = 0; $i < 3; $i++)
                        <div class="carousel-item @if ($i == 0) active @endif" height="300px" width="300px">
                            <img src="https://picsum.photos/{{ 1000 + $i }}" class="d-block w-100"
                            alt="Immagine segnaposto del prodotto {{ $product->title }}">
                        </div>
                        @endfor
                        @endif
                    </div>
                    {{-- ? fine sezione con le immagini --}}

                    {{-- ? inizio sezione freccette --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselShow"
                    data-bs-slide="prev"><span class="fa-solid fa-circle-chevron-left fa-2x text-dark"
                    aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselShow"
                    data-bs-slide="next">
                    <span class="fa-solid fa-circle-chevron-right fa-2x text-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                {{-- ? fine sezione freccette --}}
            </div>
            {{-- fine carosello --}}

        </div>



        {{-- inizio card articolo --}}
        <div class="col-12 col-lg-7 ps-lg-5 d-flex align-items-center justify-content-center text-center">
            <div class="">
                <h5 class="card-title py-4">{{ $product->title }}</h5>
                <p class="card-text">€ {{ $product->price }}</p>
                <p class="card-text">{{ $product->body }}</p>

                <p class="card-text fst-italic">{{ __('ui.category') }}: <a
                    href="{{ route('byCategory', $product->category) }}">{{ __('ui.' . $product->category->name) }}</a>
                </p>

                <p class="card-text fst-italic">{{ __('ui.createdBy') }}: <a href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a></p>

                <a href="{{ route('productIndex') }}">
                    <button class="btn btn-or ">{{ __('ui.backProducts') }}</button>
                </a>

                @if (Auth::user() && (Auth::user()->id == $product->user_id || Auth::user()->is_revisor == 1))
                <form action="{{ route('deleteProduct', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-3"><i class="fa-regular fa-trash-can fa-lg"></i></button>
                </form>
                @endif

            </div>
        </div>
        {{-- fine card articolo --}}
    </div>
</div>
</div>


</x-layout>
