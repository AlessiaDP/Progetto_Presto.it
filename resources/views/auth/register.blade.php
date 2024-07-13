<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{__('ui.welcome')}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8 shadow border p-4 my-5 rounded">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.nameSurname')}}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror mb-0" name="name">
                        @error('name')
                            <div class="alert alert-danger fst-italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.email')}}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror mb-0" name="email">
                        @error('email')
                            <div class="alert alert-danger fst-italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror mb-0" name="password">
                        @error('password')
                            <div class="alert alert-danger fst-italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.passwordConfirm')}}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-or mt-3 mb-2">{{__('ui.register')}}</button>
                    <div>
                        <p class="small">{{__('ui.registered')}}
                            <a href={{ route('login') }} class="text-or">{{__('ui.login')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
