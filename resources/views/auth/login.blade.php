<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{__('ui.welcomeBack')}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8 shadow border p-4 my-5 rounded">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">{{__('ui.email')}}</label>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">{{__('ui.password')}}</label>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-or mt-3 mb-2">{{__('ui.login')}}</button>
                    <div>
                        <p class="small">{{__('ui.notRegistered')}}
                            <a href={{route('register')}} class="text-or">{{__('ui.register')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>