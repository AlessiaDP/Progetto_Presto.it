<x-layout>

    <div class="container my-5">
        {{-- inizio sezione messaggi approvazione o rifiuto --}}
        <div class="row">
            @if (session('prodottoApprovato'))
                <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                    {{ session('prodottoApprovato') }}
                </div>
            @endif
            @if (session('prodottoRifiutato'))
                <div id="success-alert" class="alert alert-danger fw-normal fst-italic">
                    {{ session('prodottoRifiutato') }}
                </div>
            @endif
            @if (session('undoSuccess'))
                <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                    {{ session('undoSuccess') }}
                </div>
            @endif
            @if (session('undoFailed'))
                <div id="success-alert" class="alert alert-danger fw-normal fst-italic">
                    {{ session('undoFailed') }}
                </div>
            @endif
            <div class="col-12">
                <h1 class="text-center py-3">{{ __('ui.revisorPanel') }}</h1>
            </div>
        </div>
        {{-- fine sezione messaggi approvazione o rifiuto --}}

        {{-- inizio sezione annulla ultima azione --}}
        @if (auth()->user()->is_revisor == 1)
            <div class="row justify-content-center mb-5">
                <div class="col-12 pb-5 text-center">
                    <form action="{{ route('revisorUndo', $product_to_check) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning text-center">{{ __('ui.undoLastAction') }}</button>
                    </form>
                </div>
            </div>
        @endif
        {{-- fine sezione annulla ultima azione --}}

        {{-- inizio sezione prodotti in revisione --}}
        @if (!$product_to_check)
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center py-5">
                    <h3 class="display-6 text-bl">{{ __('ui.noProductsRevision') }}</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center py-5">
                    <a href="{{ route('productIndex') }}"><button class="btn btn-or ">{{ __('ui.backProducts') }}</button></a>
                </div>
            </div>
        @else
            <div class="row border shadow rounded p-5">
                <div class="col-12 col-lg-5">
                    {{-- ! inizio carosello --}}
                    <div id="carouselRevisor" class="carousel slide carousel-fade mx-auto">
                        {{-- ? inizio sezione con le MINIATURE --}}
                        <div class="carousel-indicators">
                            @if ($product_to_check->images->count())
                                @foreach ($product_to_check->images as $key => $image)
                                    <img src="{{ Storage::url($image->path) }}"
                                        alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}"
                                        data-bs-target="#carouselRevisor" data-bs-slide-to="{{ $key }}"
                                        @if ($key == 0) class="active" aria-current="true" @endif
                                        aria-label="Slide {{ $key + 1 }}">
                                @endforeach
                            @else
                                @for ($i = 0; $i < 3; $i++)
                                    <img src="https://picsum.photos/{{ 1000 + $i }}"
                                        alt="Immagine segnaposto del prodotto {{ $product_to_check->title }}"
                                        data-bs-target="#carouselRevisor" data-bs-slide-to="{{ $i }}"
                                        @if ($i == 0) class="active" aria-current="true" @endif
                                        aria-label="Slide {{ $i + 1 }}">
                                @endfor
                            @endif
                        </div>
                        {{-- ? fine sezione con le MINIATURE --}}

                        {{-- ? inizio sezione con le immagini --}}
                        <div class="carousel-inner rounded ">
                            @if ($product_to_check->images->count())
                                @foreach ($product_to_check->images as $key => $image)
                                    <div class="carousel-item @if ($key == 0) active @endif"
                                        height="300px" width="300px">
                                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100"
                                            alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}">
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 3; $i++)
                                    <div
                                        class="carousel-item @if ($i == 0) active @endif d-flex justify-content-center">
                                        <img src="https://picsum.photos/{{ 1000 + $i }}" class="d-block"
                                            alt="Immagine segnaposto del prodotto {{ $product_to_check->title }}"
                                            height="300" width="300">
                                    </div>
                                @endfor
                            @endif
                        </div>
                        {{-- ? fine sezione con le immagini --}}

                        {{-- ? inizio sezione freccette --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRevisor"
                            data-bs-slide="prev"><span class="text-dark fa-solid fa-circle-chevron-left fa-2x"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselRevisor"
                            data-bs-slide="next">
                            <span class="fa-solid fa-circle-chevron-right fa-2x text-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        {{-- ? fine sezione freccette --}}
                    </div>
                    {{-- fine carosello --}}
                </div>

                {{-- inizio card articolo --}}
                <div
                    class="col-12 col-lg-7 ps-lg-5 d-flex align-items-center justify-content-center text-center flex-column">
                    <h5 class="card-title py-4">{{ $product_to_check->title }}</h5>
                    <p class="card-text">€ {{ $product_to_check->price }}</p>
                    <p class="card-text">{{ $product_to_check->body }}</p>
                    <p class="card-text fst-italic">{{ __('ui.category') }}: <a
                            href="{{ route('byCategory', $product_to_check->category) }}">{{ __('ui.' . $product_to_check->category->name) }}</a>
                    </p>
                    <p class="card-text fst-italic">{{ __('ui.createdBy') }}: <a
                            href="{{ route('byUser', $product_to_check->user) }}">{{ $product_to_check->user->name }}</a>
                    </p>

                    <div class="d-flex justify-content-around w-50 pt-3">
                        <form action="{{ route('revisorApprove', $product_to_check) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-success">{{ __('ui.approve') }}</button>
                        </form>
                        <form action="{{ route('revisorReject', $product_to_check) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-danger">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>
                {{-- fine card articolo --}}
            </div>
        @endif
        {{-- fine sezione prodotti in revisione --}}

        {{-- inizio sezione con le informazioni delle immagini --}}
        <div class="row mt-5">
            @if ($product_to_check)
                @foreach ($product_to_check->images as $key => $image)
                    <div class="col-12 col-md-6">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start"
                                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $product_to_check->title }}'">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5>Labels</h5>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{ $label }},
                                            @endforeach
                                        @else
                                            <p class="fst-italic">No labels</p>
                                        @endif

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->adult }}"></div>
                                                    </div>
                                                    <div class="col-10">adult</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->violence }}"></div>
                                                    </div>
                                                    <div class="col-10">violence</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                                    </div>
                                                    <div class="col-10">spoof</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->racy }}"></div>
                                                    </div>
                                                    <div class="col-10">racy</div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->medical }}"></div>
                                                    </div>
                                                    <div class="col-10">medical</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        {{-- fine sezione con le informazioni delle immagini --}}
    </div>

</x-layout>
