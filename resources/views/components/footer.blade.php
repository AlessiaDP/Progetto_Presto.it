<div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center border-top py-4">
        <div class="col-md-4 mb-3 mb-md-0 d-flex">
            <a href="/" class="me-2 mb-md-0 text-decoration-none">
                <img src="/storage/img/logo.png" alt="" width="30px" height="30px">
            </a>
            <span class="text-or">&copy; 2024 Presto.it</span>
        </div>

        <div class="col-md-4 mb-3 mb-md-0 text-center d-lg-flex align-items-center justify-content-center">
            <p class="nav-item"><a href="{{ Route('home') }}" class="nav-link px-2 text-muted text-or">{{__('ui.home')}}</a></p>
            <p class="nav-item"><a href="{{ route('chiSiamo') }}" class="nav-link px-2 text-muted text-or">{{__('ui.weAre')}}</a></p>
            @guest
            <p class="nav-item"><a href="{{ route('contact') }}" class="nav-link px-2 text-muted text-or">{{ __('ui.revisorRequest') }}</a></p>
            @else
            @if (Auth::user()->is_revisor == 1)
            <p class="nav-item"><a href="{{ route('revisorIndex') }}" class="nav-link px-2 text-muted text-or">{{ __('ui.productRevision') }}</a></p>
            @else
            <p class="nav-item"><a href="{{ route('contact') }}" class="nav-link px-2 text-muted text-or">{{ __('ui.revisorRequest') }}</a></p>
            @endif
            @endguest
        </div>

        <div class="col-md-4 text-md-end">
            <ul class="list-unstyled d-flex justify-content-md-end justify-content-center pe-3">
                <li class="ms-3"><a class="text-or" href="https://www.youtube.com/watch?v=Gssj0JBgtbQ" target="_blank"><i class="fab fa-youtube fa-lg"></i></a></li>
                <li class="ms-3"><a class="text-or" href="https://www.facebook.com/profile.php?id=61562045785182" target="_blank"><i class="fab fa-facebook-f fa-lg"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
