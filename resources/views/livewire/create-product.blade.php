<div>
    {{-- Be like water. --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8 rounded shadow border p-4">

                <form wire:submit.prevent="createProduct" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.title')}}:</label>
                        <input type="text" wire:model.blur="title"
                        class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="alert alert-danger fst-italic small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{__('ui.price')}}:</label>
                        <input type="number" wire:model.blur="price"
                        class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="alert alert-danger fst-italic small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{__('ui.description')}}:</label>
                        <textarea wire:model.blur="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="alert alert-danger fst-italic small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="" for="specificSizeSelect">{{__('ui.categorySelect')}}:</label>
                        <select class="form-select" id="specificSizeSelect" wire:model.blur="categorySelect">
                            @foreach ($categories as $category)
                            <option class="" value="{{ $category->id }}">{{__('ui.' . $category->name)}}
                            </option>
                            @endforeach
                        </select>
                        @error('categorySelect')
                        <div class="alert alert-danger fst-italic small text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- inserimento immagini --}}
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.images')}}:</label>
                        <input type="file" multiple wire:model.live="temporary_images"
                        class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                        @error('temporary_images.*')
                        <p class="fst-italic text-danger">{{$message}}</p>
                        @enderror
                        @error('temporary_images')
                        <p class="fst-italic text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>{{__('ui.imagesPreview')}}:</p>
                            <div class="row border border-4 border-warning rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                <div class="col-4 d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded" style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                    <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">X</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn mt-3 btn-or">{{__('ui.publishBtn')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>