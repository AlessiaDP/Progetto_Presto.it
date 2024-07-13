<nav class="navbar navbar-expand-md bg-bl">
    <div class="container-fluid">
        {{-- logo che riporta alla home --}}
        <a class="navbar-brand ps-3" href="{{ route('home') }}">
            <img src="/storage/img/logo.png" alt="..." height="50px">
        </a>
        {{-- hambuger button --}}
        <button class="navbar-toggler p-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-or fa-xl"></i></button>

        {{-- inizio menu della navbar --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- sezione home e categorie a sinistra --}}
            <div>
                <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold text-gr"
                                    href="{{ route('home') }}">{{ __('ui.home') }}</a>
                            </li>
                        </div>

                        {{-- sezione di destra a sinistra se compatta --}}
                        <div class="d-flex align-items-center justify-content-end d-md-none">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-gr fw-semibold" href="{{ route('login') }}">
                                        <button data-mdb-ripple-init type="button"
                                            class="btn btn-or">{{ __('ui.login') }}</button>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-gr fw-semibold" href="{{ route('register') }}">
                                        <button type="button" class="btn btn-dark"
                                            data-mdb-ripple-init>{{ __('ui.register') }}</button>
                                    </a>
                                </li>
                            @else
                                <a class="navbar-brand ps-3 invisible d-none d-lg-block" href="{{ route('home') }}">
                                    <img src="/storage/img/logo.png" alt="..." height="50px">
                                </a>
                                <div class="d-md-flex align-items-center justify-content-end d-none">
                                    <i class="fas fa-bell fa-xl text-gr invisible"></i>
                                    <div class="d-flex align-items-center p-3">
                                        <a class="text-gr" href="{{ route('productFavorites') }}">
                                            @php
                                                $user = Auth::user();
                                                $favoriteProductsCount = $user ? $user->favoriteProducts()->count() : 0;
                                            @endphp
                                            @if ($favoriteProductsCount > 0)
                                                <i class="fas fa-heart fa-xl text-danger"></i>
                                                <span class="badge rounded-pill badge-notification bg-or">
                                                    {{ $favoriteProductsCount }}
                                                </span>
                                            @else
                                                <i class="fas fa-heart fa-xl text-gr"></i>
                                                <span class="badge rounded-pill badge-notification bg-or">
                                                    {{ $favoriteProductsCount }}
                                                </span>
                                            @endif
                                        </a>

                                        {{-- inizio sezione revisore --}}
                                        @if (Auth::user()->is_revisor == 1)
                                            <div class="dropdown ms-3">
                                                <a data-bs-toggle="dropdown"
                                                    class="text-warning dropdown-toggle hidden-arrow" href="#"
                                                    id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                                    @if (\App\Models\Product::toBeRevisedCount() > 0)
                                                        <i class="fas fa-bell fa-xl"></i>
                                                        <span class="badge rounded-pill badge-notification bg-or">
                                                            {{ \App\Models\Product::toBeRevisedCount() }}
                                                        </span>
                                                    @else
                                                        <i class="fas fa-bell fa-xl text-gr"></i>
                                                    @endif
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end bg-gr"
                                                    aria-labelledby="navbarDropdownMenuLink">
                                                    <li>
                                                        <a class="dropdown-item text-bl"
                                                            href="{{ route('revisorIndex') }}">
                                                            {{ __('ui.productRevision') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                        {{-- fine sezione revisore --}}

                                        <!-- Avatar -->
                                        <div class="dropdown">
                                            <a data-bs-toggle="dropdown"
                                                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                                href="#" id="navbarDropdownMenuAvatar" role="button"
                                                aria-expanded="false">
                                                <i class="fas fa-user fa-xl text-gr ms-3"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end bg-gr"
                                                aria-labelledby="navbarDropdownMenuAvatar">
                                                <li>
                                                    <a class="dropdown-item text-bl disabled" href="#">
                                                        {{ __('ui.hello') }}, {{ Auth::user()->name }}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-bl"
                                                        href="{{ route('productCreate') }}">{{ __('ui.productCreate') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-bl"
                                                        href="{{ route('productIndex') }}">{{ __('ui.listProducts') }}</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST"
                                                        class="text-center">
                                                        @csrf
                                                        <button class="btn fw-semibold text-or" id="logout"
                                                            type="submit">
                                                            {{ __('ui.logout') }}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-gr fw-semibold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('ui.allCategories') }}
                                </a>
                                <ul class="dropdown-menu bg-gr">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item text-bl"
                                                href="{{ route('byCategory', $category) }}">{{ __('ui.' . $category->name) }}</a>
                                        </li>
                                        @if (!$loop->last)
                                            <hr class="dropdown-divider">
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </div>

                        {{-- sezione di destra a sinistra se compatta --}}
                        <li class="nav-item dropdown my-auto d-md-none d-flex">
                            <a class="nav-link dropdown-toggle text-gr fw-semibold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (session('locale') == 'en')
                                    <img src="{{ asset('vendor/blade-flags/language-en.svg') }}" width="24"
                                        height="24" alt="bandiera inglese">
                                @elseif (session('locale') == 'tr')
                                    <img src="{{ asset('vendor/blade-flags/language-tr.svg') }}" width="24"
                                        height="24" alt="bandiera turca">
                                @elseif (session('locale') == 'fr')
                                    <img src="{{ asset('vendor/blade-flags/language-fr.svg') }}" width="24"
                                        height="24" alt="bandiera francese">
                                @elseif (session('locale') == 'es')
                                    <img src="{{ asset('vendor/blade-flags/language-es.svg') }}" width="24"
                                        height="24" alt="bandiera spagnola">
                                @else
                                    <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" width="24"
                                        height="24" alt="bandiera italiana">
                                @endif
                            </a>
                            <ul class="dropdown-menu bg-gr dropdown-menu-end">
                                <li>
                                    <form class="d-inline" method="POST" action="{{ route('setLocale', 'it') }}">
                                        @csrf
                                        <button class="btn locale-btn" type="submit">
                                            <img src="{{ asset('vendor/blade-flags/language-it.svg') }}"
                                                alt="Italian" width="24" height="24">
                                            <span class="locale-text"> - Italiano</span>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="d-inline" method="POST" action="{{ route('setLocale', 'en') }}">
                                        @csrf
                                        <button class="btn locale-btn" type="submit">
                                            <img src="{{ asset('vendor/blade-flags/language-en.svg') }}"
                                                alt="English" width="24" height="24">
                                            <span class="locale-text"> - English</span>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="d-inline" method="POST" action="{{ route('setLocale', 'fr') }}">
                                        @csrf
                                        <button class="btn locale-btn" type="submit">
                                            <img src="{{ asset('vendor/blade-flags/language-fr.svg') }}"
                                                alt="French" width="24" height="24">
                                            <span class="locale-text"> - Français</span>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="d-inline" method="POST" action="{{ route('setLocale', 'es') }}">
                                        @csrf
                                        <button class="btn locale-btn" type="submit">
                                            <img src="{{ asset('vendor/blade-flags/language-es.svg') }}"
                                                alt="Spanish" width="24" height="24">
                                            <span class="locale-text"> - Español</span>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form class="d-inline" method="POST" action="{{ route('setLocale', 'tr') }}">
                                        @csrf
                                        <button class="btn locale-btn" type="submit">
                                            <img src="{{ asset('vendor/blade-flags/language-tr.svg') }}"
                                                alt="Turkish" width="24" height="24">
                                            <span class="locale-text"> - Türkçe</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>

                </ul>
            </div>

            {{-- sezione ricerca al centro --}}
            <div class="d-flex mx-0 mx-md-auto">
                <form role="search" action="{{ route('searchProduct') }}" method="GET">
                    <div class="input-group">
                        <input id="search-input" type="search" class="form-control" name="query"
                            placeholder="{{ __('ui.search') }}" />
                        <button id="search-button" type="submit" class="btn btn-or">
                            <i class="fas fa-search fa-xl"></i>
                        </button>
                    </div>
                </form>
            </div>
            {{-- fine sezione ricerca --}}

            <div>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto my-3 my-md-0">
                    {{-- sezione autenticazione --}}
                    @guest
                        <li class="nav-item d-md-flex d-none">
                            <a class="nav-link text-gr fw-semibold" href="{{ route('login') }}">
                                <button data-mdb-ripple-init type="button"
                                    class="btn btn-or">{{ __('ui.login') }}</button>
                            </a>
                        </li>
                        <li class="nav-item d-md-flex d-none">
                            <a class="nav-link text-gr fw-semibold" href="{{ route('register') }}">
                                <button type="button" class="btn btn-dark"
                                    data-mdb-ripple-init>{{ __('ui.register') }}</button>
                            </a>
                        </li>
                    @else
                        <a class="navbar-brand ps-3 invisible d-none d-lg-block" href="{{ route('home') }}">
                            <img src="/storage/img/logo.png" alt="..." height="50px">
                        </a>
                        <div class="d-md-flex align-items-center justify-content-end d-none">
                            <i class="fas fa-bell fa-xl text-gr invisible"></i>
                            <div class="d-flex align-items-center p-3">
                                <a class="text-gr" href="{{ route('productFavorites') }}">
                                    @php
                                        $user = Auth::user();
                                        $favoriteProductsCount = $user ? $user->favoriteProducts()->count() : 0;
                                    @endphp
                                    @if ($favoriteProductsCount > 0)
                                        <i class="fas fa-heart fa-xl text-danger"></i>
                                        <span class="badge rounded-pill badge-notification bg-or">
                                            {{ $favoriteProductsCount }}
                                        </span>
                                    @else
                                        <i class="fas fa-heart fa-xl text-gr"></i>
                                        <span class="badge rounded-pill badge-notification bg-or">
                                            {{ $favoriteProductsCount }}
                                        </span>
                                    @endif
                                </a>

                                {{-- inizio sezione revisore --}}
                                @if (Auth::user()->is_revisor == 1)
                                    <div class="dropdown ms-3">
                                        <a data-bs-toggle="dropdown" class="text-warning dropdown-toggle hidden-arrow"
                                            href="#" id="navbarDropdownMenuLink" role="button"
                                            aria-expanded="false">
                                            @if (\App\Models\Product::toBeRevisedCount() > 0)
                                                <i class="fas fa-bell fa-xl"></i>
                                                <span class="badge rounded-pill badge-notification bg-or">
                                                    {{ \App\Models\Product::toBeRevisedCount() }}
                                                </span>
                                            @else
                                                <i class="fas fa-bell fa-xl text-gr"></i>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end bg-gr"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item text-bl" href="{{ route('revisorIndex') }}">
                                                    {{ __('ui.productRevision') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                {{-- fine sezione revisore --}}

                                <!-- Avatar -->
                                <div class="dropdown">
                                    <a data-bs-toggle="dropdown"
                                        class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                        id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                                        <i class="fas fa-user fa-xl text-gr ms-3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end bg-gr"
                                        aria-labelledby="navbarDropdownMenuAvatar">
                                        <li>
                                            <a class="dropdown-item text-bl disabled" href="#">
                                                {{ __('ui.hello') }}, {{ Auth::user()->name }}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-bl"
                                                href="{{ route('productCreate') }}">{{ __('ui.productCreate') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-bl"
                                                href="{{ route('productIndex') }}">{{ __('ui.listProducts') }}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" class="text-center">
                                                @csrf
                                                <button class="btn fw-semibold text-or" id="logout" type="submit">
                                                    {{ __('ui.logout') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endguest
                    {{-- fine sezione autenticazione --}}

                    {{-- sezione lingue --}}
                    <li class="nav-item dropdown my-auto d-md-flex d-none">
                        <a class="nav-link dropdown-toggle text-gr fw-semibold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (session('locale') == 'en')
                                <img src="{{ asset('vendor/blade-flags/language-en.svg') }}" width="24"
                                    height="24" alt="bandiera inglese">
                            @elseif (session('locale') == 'tr')
                                <img src="{{ asset('vendor/blade-flags/language-tr.svg') }}" width="24"
                                    height="24" alt="bandiera turca">
                            @elseif (session('locale') == 'fr')
                                <img src="{{ asset('vendor/blade-flags/language-fr.svg') }}" width="24"
                                    height="24" alt="bandiera francese">
                            @elseif (session('locale') == 'es')
                                <img src="{{ asset('vendor/blade-flags/language-es.svg') }}" width="24"
                                    height="24" alt="bandiera spagnola">
                            @else
                                <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" width="24"
                                    height="24" alt="bandiera italiana">
                            @endif
                        </a>
                        <ul class="dropdown-menu bg-gr dropdown-menu-end">
                            <li>
                                <form class="d-inline" method="POST" action="{{ route('setLocale', 'it') }}">
                                    @csrf
                                    <button class="btn locale-btn" type="submit">
                                        <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" alt="Italian"
                                            width="24" height="24">
                                        <span class="locale-text"> - Italiano</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form class="d-inline" method="POST" action="{{ route('setLocale', 'en') }}">
                                    @csrf
                                    <button class="btn locale-btn" type="submit">
                                        <img src="{{ asset('vendor/blade-flags/language-en.svg') }}" alt="English"
                                            width="24" height="24">
                                        <span class="locale-text"> - English</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form class="d-inline" method="POST" action="{{ route('setLocale', 'fr') }}">
                                    @csrf
                                    <button class="btn locale-btn" type="submit">
                                        <img src="{{ asset('vendor/blade-flags/language-fr.svg') }}" alt="French"
                                            width="24" height="24">
                                        <span class="locale-text"> - Français</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form class="d-inline" method="POST" action="{{ route('setLocale', 'es') }}">
                                    @csrf
                                    <button class="btn locale-btn" type="submit">
                                        <img src="{{ asset('vendor/blade-flags/language-es.svg') }}" alt="Spanish"
                                            width="24" height="24">
                                        <span class="locale-text"> - Español</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form class="d-inline" method="POST" action="{{ route('setLocale', 'tr') }}">
                                    @csrf
                                    <button class="btn locale-btn" type="submit">
                                        <img src="{{ asset('vendor/blade-flags/language-tr.svg') }}" alt="Turkish"
                                            width="24" height="24">
                                        <span class="locale-text"> - Türkçe</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        {{-- fine sezione lingue --}}
    </div>
    </div>
</nav>
