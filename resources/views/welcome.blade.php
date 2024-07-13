<x-layout>

    {{-- inizio sezione alert --}}
    <div class="container">
        <div class="row">
            @if (session('revisorError'))
            <div id="success-alert" id="success-alert" class="alert alert-danger fw-normal fst-italic">
                {{ session('revisorError') }}
            </div>
            @endif

            @if (session('richiestaRevisore'))
            <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                {{ session('richiestaRevisore') }}
            </div>
            @endif

            @if (session('revisorCreated'))
            <div id="success-alert" class="alert alert-success fw-normal fst-italic">
                {{ session('revisorCreated') }}
            </div>
            @endif

            @if (session('rimossoPreferito'))
            <div id="success-alert" class="alert alert-warning">{{ session('rimossoPreferito') }}</div>
            @endif

            @if (session('message'))
            <div id="success-alert" class="alert alert-info">{{ session('message') }}</div>
            @endif

            @if (session('prodottoEliminato'))
            <div id="success-alert" class="alert alert-danger">{{ session('prodottoEliminato') }}</div>
            @endif
        </div>
    </div>
    {{-- fine sezione alert --}}

    {{-- inizio header --}}
    <div class="container-fluid p-0">
        <div class="p-5 text-center bg-image" style="background-image: url('/storage/img/header.png'); height: 470px; ">
            <div class="mask" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0));">
                <div class="p-5 d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 h-100">
                        <h1 class="py-3 display-3 fw-semibold">{{ __('ui.welcome') }}</h1>
                        <h4 class="pt-3 pb-5 fst-italic display-6"> <img src="/storage/img/logo.png"
                            style="height: 80px" alt=""> {{ __('ui.slogan') }}</h4>
                            @if (count($products) != 0)
                            <div class="col-12 text-center pt-4 mt-5">
                                <a data-mdb-ripple-init class="btn btn-dark btn-lg h1"
                                href="{{ route('productCreate') }}" role="button">{{ __('ui.productCreate') }}</a>
                            </div>
                            @else
                            <div class="col-12 text-center pt-5 mt-5">
                                <a data-mdb-ripple-init class="btn btn-dark btn-lg h1"
                                href="{{ route('productCreate') }}" role="button">{{ __('ui.firstProduct') }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- fine header --}}

        {{-- inizio sezione annunci --}}
        <div class="container my-5 ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 my-3 text-center">
                    <h3 class="display-6">{{ __('ui.lastProducts') }}</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($products as $product)
                <div class="col-12 col-lg-3 m-4">
                    <x-card :product="$product" :category="$product->category" />
                    </div>
                    @endforeach
                    @if (count($products) == 0)
                    <div class="col-12 col-md-5 m-4">
                        <p class="alert alert-warning text-center">{{ __('ui.noProducts') }}</p>
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
            {{-- fine sezione annunci --}}


        </x-layout>
