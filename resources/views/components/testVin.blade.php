{{-- ! FILE CHE USA VIN PER I TEST, NON TOCCARE GRAZIE --}}

{{-- TODO SEZIONE AUTENTIFICAZIONE --}}
<!-- Right elements -->
{{-- <div class="d-flex align-items-center">
    <!-- Icon -->
    <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
    </a>

    <div class="dropdown">
        <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
                <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Something else here</a>
            </li>
        </ul>
    </div>
    <!-- Avatar -->
    <div class="dropdown">
        <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end bg-gr" aria-labelledby="navbarDropdownMenuAvatar"
        >
        <li>
            <a class="dropdown-item text-bl" href="#"> {{__('ui.hello')}}, {{Auth::user()->name}} My profile</a>
        </li>
        <li><a class="dropdown-item text-bl" href="{{route('productCreate')}}">Pubblica Prodotto</a></li>
        <li><a class="dropdown-item text-bl" href="{{route('productIndex')}}">Catalogo Prodotti</a></li>
        <li><a class="dropdown-item text-bl" href="{{route('revisorIndex')}}">Revisione Prodotti</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <form action="{{route('logout')}}" method="POST" class="text-center">
                @csrf
                <button class="btn fw-semibold text-or" id="logout" type="submit">
                    Disconnettiti
                </button>
            </form>
        </li>
    </ul>
</div>
</div> --}}



{{-- TODO QUANDO SEI GUEST --}}
{{--
<div>
    <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
        Login
    </button>
    <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
        Sign up for free
    </button>
</div>
--}}



{{-- TODO HEADER CON IMMAGINI --}}
{{--
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body fixed-top"></nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div class="p-5 text-center bg-image" style="
    background-image: url('/storage/app/public/img/header.jpg');
    height: 400px; margin-top: 58px;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Heading</h1>
                <h4 class="mb-3">Subheading</h4>
                <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button">Call to action</a>
            </div>
        </div>
    </div>
</div>
<!-- Background image -->
</header>
--}}



{{-- TODO VECCHIO HEADER --}}
{{-- inizio pseuso header --}}
{{-- <div class="container my-5">
    <div class="row justify-content-start align-items-center imgHeader">
        <div class="col-12">
            <h1 class="text-center display-3 text-bl fw-semibold">Benvenuto su Presto.it</h1>
        </div>
        <div class="col-12 col-md-2 my-5 text-center ps-lg-5">
            <img src="/storage/img/logo.png" alt="..." width="200px" height="200px">
        </div>
        <div class="col-12 col-md-5 my-5 text-center align-items-end d-flex h-25 ps-lg-5">
            <h4 class="display-6 fst-italic text-bl fw-semibold bgHeader rounded">Affari in un lampo!</h4>
        </div>
        {{-- bottone pubblica prodotto --}}
{{-- @if (count($products) != 0)
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-4 text-center">
                <a href="{{ route('productCreate') }}">
                    <button class="btn btn-dark text-or">Pubblica un prodotto</button>
                </a>
            </div>
        </div>
        @endif
        {{-- fine bottone pubblica prodotto --}}
{{-- </div>
    </div> --}}
{{-- fine pseuso header --}}










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
                <h1 class="text-center py-5"> Pannello Revisore </h1>
            </div>
        </div>
        {{-- fine sezione messaggi approvazione o rifiuto --}}

        {{-- inizio sezione annulla ultima azione --}}
        @if ($product_to_check && $product_to_check->is_approved == 0)
            <div class="row justify-content-end mb-3">
                <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center pb-5 pb-lg-0 ps-lg-5">
                    <form action="{{ route('revisorUndo', $product_to_check) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Annulla Ultima Azione</button>
                    </form>
                </div>
            </div>
        @endif
        {{-- fine sezione annulla ultima azione --}}

        {{-- inizio sezione prodotti in revisione --}}
        @if (!$product_to_check)
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center py-5">
                    <h3 class="display-6 text-bl">Non ci sono prodotti in revisione</h3>
                </div>
            </div>
        @else
            <div class="row border shadow rounded p-5">
                <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center pb-5 pb-lg-0 ps-lg-5">

                    {{-- inizio sezione immagini del prodotto --}}
                    {{-- @if ($product_to_check->images->count())
                    @foreach ($product_to_check->images as $key => $image)
                    <div class="col-6 col-md-4 mb-4">
                        <img src="{{Storage::url($image->path) }}" class="img-fluid rounded shadow" alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}">
                    </div>
                    @endforeach
                    @else
                    @for ($i = 0; $i < 5; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="Immagine segnaposto del prodotto {{ $product_to_check->title }}">
                    </div>
                    @endfor
                    @endif --}}
                    {{-- fine sezione immagini del prodotto --}}

                    {{-- ? inizio carosello --}}
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
                        {{-- ? inizio sezione con le MINIATURE --}}
                        <div class="carousel-indicators">
                            @if ($product_to_check->images->count())
                                @foreach ($product_to_check->images as $key => $image)
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded circle shadow"
                                        alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}"
                                        @if ($key == 0) class="active"
                            aria-current="true" @endif
                                        data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}" aria-label="Slide {{ $key + 1 }}">
                                @endforeach
                            @endif
                        </div>
                        {{-- ? fine sezione con le MINIATURE --}}

                        {{-- inizio sezione con le immagini --}}
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1000" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1001" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1002" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1003" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1004" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    {{-- <div class="carousel-inner rounded">
                        @if ($product_to_check->images->count())
                        @foreach ($product_to_check->images as $key => $image)
                        <div class="col-6 col-md-4 mb-4">
                            <img src="{{ Storage::url($image->path)}}" class=" img-fluid rounded shadow w-100" alt="immagine {{$key +1}}">
                        </div>
                        @endforeach
                        @else
                        @for ($i = 0; $i < 5; $i++)
                        <div class="col-6 col-md-4 mb-4 text-center">
                            <img src="https://picsum.photos/300" class=" img-fluid rounded shadow w-100" alt="immagine segnaposto">
                        </div>
                        @endfor
                        @endif --}}
                    {{-- fine sezione con le immagini --}}

                    {{-- inizio sezione freccette --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev"><span class="fa-solid fa-circle-chevron-left fa-2x"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="fa-solid fa-circle-chevron-right fa-2x" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    {{-- fine sezione freccette --}}
                </div>
                {{-- fine carosello --}}
            </div>

            {{-- inizio card articolo --}}
            <div
                class="col-12 col-lg-7 ps-lg-5 d-flex align-items-center justify-content-center text-center flex-column">
                <h5 class="card-title py-4">{{ $product_to_check->title }}</h5>
                <p class="card-text">€ {{ $product_to_check->price }}</p>
                <p class="card-text">{{ $product_to_check->body }}</p>
                <p class="card-text fst-italic">Categoria: <a
                        href="{{ route('byCategory', $product_to_check->category) }}">{{ $product_to_check->category->name }}</a>
                </p>
                <p class="card-text fst-italic">Creato da: <a
                        href="{{ route('byUser', $product_to_check->user) }}">{{ $product_to_check->user->name }}</a>
                </p>
                <div class="d-flex justify-content-around w-50 pt-3">
                    <form action="{{ route('revisorApprove', $product_to_check) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-success">Approva</button>
                    </form>
                    <form action="{{ route('revisorReject', $product_to_check) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-danger">Rifiuta</button>
                    </form>
                </div>
            </div>
            {{-- fine card articolo --}}
    </div>
    @endif
    </div>
</x-layout>










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
                <h1 class="text-center py-5"> Pannello Revisore </h1>
            </div>
        </div>
        {{-- fine sezione messaggi approvazione o rifiuto --}}

        {{-- inizio sezione annulla ultima azione --}}
        @if ($product_to_check && $product_to_check->is_approved == 0)
            <div class="row justify-content-end mb-3">
                <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center pb-5 pb-lg-0 ps-lg-5">
                    <form action="{{ route('revisorUndo', $product_to_check) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Annulla Ultima Azione</button>
                    </form>
                </div>
            </div>
        @endif
        {{-- fine sezione annulla ultima azione --}}

        {{-- inizio sezione prodotti in revisione --}}
        @if (!$product_to_check)
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center py-5">
                    <h3 class="display-6 text-bl">Non ci sono prodotti in revisione</h3>
                </div>
            </div>
        @else
            <div class="row border shadow rounded p-5">
                <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center pb-5 pb-lg-0 ps-lg-5">

                    {{-- ! inizio carosello --}}
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade">

                        {{-- ? inizio sezione con le MINIATURE --}}
                        <div class="carousel-indicators">
                            <img src="https://picsum.photos/100" alt="..."
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1">
                            <img src="https://picsum.photos/100" alt="..."
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2">
                            <img src="https://picsum.photos/100" alt="..."
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3">
                            <img src="https://picsum.photos/100" alt="..."
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 4">
                            <img src="https://picsum.photos/100" alt="..."
                                data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                aria-label="Slide 5">
                        </div>
                        {{-- ? fine sezione con le MINIATURE --}}

                        {{-- ? inizio sezione con le immagini --}}
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1000" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1001" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1002" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1003" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1004" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        {{-- ? fine sezione con le immagini --}}

                        {{-- ? inizio sezione freccette --}}
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><span
                                class="fa-solid fa-circle-chevron-left fa-2x" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span></button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="fa-solid fa-circle-chevron-right fa-2x" aria-hidden="true"></span>
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
                    <p class="card-text fst-italic">Categoria: <a
                            href="{{ route('byCategory', $product_to_check->category) }}">{{ $product_to_check->category->name }}</a>
                    </p>
                    <p class="card-text fst-italic">Creato da: <a
                            href="{{ route('byUser', $product_to_check->user) }}">{{ $product_to_check->user->name }}</a>
                    </p>

                    <div class="d-flex justify-content-around w-50 pt-3">
                        <form action="{{ route('revisorApprove', $product_to_check) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-success">Approva</button>
                        </form>
                        <form action="{{ route('revisorReject', $product_to_check) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
                </div>
                {{-- fine card articolo --}}
            </div>
        @endif
    </div>

</x-layout>



@if ($product_to_check->images->count())
    @foreach ($product_to_check->images as $key => $image)
        <div class="col-6 col-md-4 mb-4">
            <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded shadow"
                alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}">
        </div>
    @endforeach
@else
    @for ($i = 0; $i < 6; $i++)
        <div class="col-6 col-md-4 mb-4 text-center">
            <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                alt="Immagine segnaposto del prodotto {{ $product_to_check->title }}">
        </div>
    @endfor
@endif



@if ($product_to_check->images->count())
    @foreach ($product_to_check->images as $key => $image)
        <img src="{{ Storage::url($image->path) }}"
            alt="Immagine {{ $key + 1 }} del prodotto {{ $product_to_check->title }}"
            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
            @if ($key == 0) class="active"
aria-current="true" @endif
            aria-label="Slide {{ $key + 1 }}">
    @endforeach
@else
    @for ($i = 0; $i < 6; $i++)
        <img src="https://picsum.photos/1000" alt="Immagine segnaposto del prodotto {{ $product_to_check->title }}"
            data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
            @if ($key == 0) class="active"
aria-current="true" @endif
            aria-label="Slide {{ $key + 1 }}">
    @endfor
@endif




{{-- ! inizio carosello --}}
<div id="carouselExampleIndicators" class="carousel slide carousel-fade">

    {{-- ? inizio sezione con le MINIATURE --}}
    <div class="carousel-indicators">
        @if ($product->images->count())
            @foreach ($product->images as $key => $image)
                <img src="{{ Storage::url($image->path) }}"
                    alt="Immagine {{ $key + 1 }} del prodotto {{ $product->title }}"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                    @if ($key == 0) class="active"
        aria-current="true" @endif
                    aria-label="Slide {{ $key + 1 }}">
            @endforeach
        @else
            @for ($i = 0; $i < 3; $i++)
                <img src="https://picsum.photos/1000" alt="Immagine segnaposto del prodotto {{ $product->title }}"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                    @if ($key == 0) class="active"
        aria-current="true" @endif
                    aria-label="Slide {{ $key + 1 }}">
            @endfor
        @endif
    </div>
    {{-- ? fine sezione con le MINIATURE --}}

    {{-- ? inizio sezione con le immagini --}}
    <div class="carousel-inner rounded">
        @if ($product->images->count())
            @foreach ($product->images as $key => $image)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img src="{{ $image->getUrl(600, 400) }}" class="d-block w-100"
                        alt="Immagine {{ $key + 1 }} del prodotto {{ $product->title }}">
                </div>
            @endforeach
        @else
            @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img src="https://picsum.photos/{{ 1000 + $i }}" class="d-block"
                        alt="Immagine segnaposto del prodotto {{ $product->title }}" height="300px" width="300px">
                </div>
            @endfor
        @endif
    </div>
    {{-- ? fine sezione con le immagini --}}

    {{-- ? inizio sezione freccette --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"><span class="fa-solid fa-circle-chevron-left fa-2x" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="fa-solid fa-circle-chevron-right fa-2x" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    {{-- ? fine sezione freccette --}}
</div>
{{-- fine carosello --}}




<div class="card" style="height: 600px">
    <div class="card-body justify-content-between d-flex flex-column">
        <div>
            @if($product->images->isNotEmpty())
                <p>Image URL: {{ $product->images->first()->getUrl(600, 400) }}</p>
                <img src="{{ $product->images->first()->getUrl(600, 400) }}" alt="Immagine prodotto {{$product->title}}" class="card-img-top">
            @else
                <p>No images found, using default</p>
                <img src="https://picsum.photos/200" alt="Immagine prodotto {{$product->title}}" class="card-img-top">
            @endif

            <h5 class="card-title pb-3">{{$product->title}} id#{{$product->id}}</h5>
            <p class="card-text text-center">€ {{$product->price}}</p>
            <p class="card-text">{{$product->getDet()}}</p>

            @if ($product->category)
                <p class="card-text fst-italic">{{ __('ui.category') }}: <a href="{{ route('byCategory', $product->category) }}">{{ $product->category->name }}</a></p>
            @endif
            @if ($product->user)
                <p class="card-text fst-italic">{{ __('ui.createdBy') }}: <a href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a></p>
            @endif
        </div>
        <div>
            <a href="{{ route('productShow', $product) }}" class="btn btn-or">{{ __('ui.details') }}</a>
        </div>
    </div>
</div>


{{--! nostra card --}}
<div class="card" style="height: 600px">
    <div class="card-body justify-content-between d-flex flex-column">
        <div>
            <img src="{{ $product->images->isNotEmpty() ? $product->images->first()->getUrl(600, 400) : 'https://picsum.photos/200' }}"
                alt="Immagine prodotto {{ $product->title }}" class="card-img-top">
            <h5 class="card-title pb-3">{{ $product->title }} id#{{ $product->id }}</h5>
            <p class="card-text text-center">€ {{ $product->price }}</p>
            <p class="card-text">{{ $product->getDet() }}</p>

            @if ($product->category)
                <p class="card-text fst-italic">{{ __('ui.category') }}: <a
                        href="{{ route('byCategory', $product->category) }}">{{ $product->category->name }}</a></p>
            @endif
            @if ($product->user)
                <p class="card-text fst-italic">{{ __('ui.createdBy') }}: <a
                        href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a></p>
            @endif
        </div>
        <div>
            <a href="{{ route('productShow', $product) }}" class="btn btn-or">{{ __('ui.details') }}</a>
        </div>
    </div>
</div>





{{-- card 1 --}}
<div class="card" style="height: 600px">
    <div class="card-body justify-content-between d-flex flex-column">
        <div>
            <img src="{{ $product->images->isNotEmpty() ? $product->images->first()->getUrl(300, 300) : 'https://picsum.photos/200' }}"
            alt="Immagine prodotto {{ $product->title }}" class="card-img-top" >
            @if ($product->favorite == 0)
            <div id="favorite-section" class="d-flex justify-content-between py-2">
                <h5 class="card-title pb-3">{{ $product->title }}</h5>
                <form action="{{ route('productFavorite', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fa-regular fa-lg fa-heart text-danger"></i>
                    </button>
                </form>
            </div>
            @elseif ($product->favorite == 1)
            <div id="favorite-section" class="d-flex justify-content-between py-2">
                <h5 class="card-title pb-3">{{ $product->title }}</h5>
                <form action="{{ route('productUnfavorite', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0;">
                        <i class="fas fa-heart fa-lg text-danger"></i>
                    </button>
                </form>
            </div>
            @endif
            <p class="card-text text-center">€ {{ $product->price }}</p>
            <p class="card-text">{{ $product->getDet() }}</p>

            @if ($product->category)
            <p class="card-text fst-italic">{{ __('ui.category') }}: <a
                href="{{ route('byCategory', $product->category) }}">{{ __('ui.' . $product->category->name) }}</a>
            </p>
            @endif
            @if ($product->user)
            <p class="card-text fst-italic">{{ __('ui.createdBy') }}: <a
                href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a></p>
                @endif
            </div>
            <div>
                <a href="{{ route('productShow', $product) }}" class="btn btn-or">{{ __('ui.details') }}</a>
            </div>
        </div>
    </div>


{{-- card 2 --}}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $product->images->isNotEmpty() ? $product->images->first()->getUrl(300, 300) : 'https://picsum.photos/200' }}"
                alt="Immagine prodotto {{ $product->title }}" class="img-fluid rounded-start" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    @if ($product->favorite == 0)
                    <div id="favorite-section" class="d-flex justify-content-between py-2">
                        <h5 class="card-title pb-3">{{ $product->title }}</h5>
                        <form action="{{ route('productFavorite', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; padding:0;">
                                <i class="fa-regular fa-lg fa-heart text-danger"></i>
                            </button>
                        </form>
                    </div>
                    @elseif ($product->favorite == 1)
                    <div id="unfavorite-section" class="d-flex justify-content-between py-2">
                        <h5 class="card-title pb-3">{{ $product->title }}</h5>
                        <form action="{{ route('productUnfavorite', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; padding:0;">
                                <i class="fas fa-heart fa-lg text-danger"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                    <p class="card-text">€ {{ $product->price }}</p>
                    <p class="card-text">{{ $product->getDet() }}</p>
                    
                    @if ($product->category)
                    <p class="card-text fst-italic">{{ __('ui.category') }}: 
                        <a href="{{ route('byCategory', $product->category) }}">{{ __('ui.' . $product->category->name) }}</a>
                    </p>
                    @endif
                    @if ($product->user)
                    <p class="card-text fst-italic">{{ __('ui.createdBy') }}: 
                        <a href="{{ route('byUser', $product->user) }}">{{ $product->user->name }}</a>
                    </p>
                    @endif
                    <a href="{{ route('productShow', $product) }}" class="btn btn-or">{{ __('ui.details') }}</a>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
