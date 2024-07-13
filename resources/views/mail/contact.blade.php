<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{__('ui.revisorRequest')}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8 shadow border p-4 my-5 rounded">
                <form method="POST" action="{{ route('submitContact') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Nome e Cognome" name="name">
                        {{-- <input type="text" class="form-control" id="floatingInput" placeholder="Nome e Cognome" name="name"> --}}
                        <label for="floatingInput">{{__('ui.nameSurname')}}</label>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">{{__('ui.email')}}</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.whyAssumeYou')}}</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control"  placeholder="{{__('ui.tellUsAbout')}}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-or mt-3 mb-2">{{__('ui.candidate')}}</button>
                    <div>
                        <p class="small">{{__('ui.changedIdea')}}
                            <a href={{route('home')}} class="text-or">{{__('ui.backHome')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>