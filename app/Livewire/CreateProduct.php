<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateProduct extends Component
{
    use WithFileUploads;

    #[Validate("required", message: "Il nome del prodotto è richiesto")]
    #[Validate("min:3", message: "Il nome del prodotto è troppo breve")]
    #[Validate("max:50", message: "Il nome del prodotto è troppo lungo")]
    public $title;

    #[Validate("required", message: "Il prezzo del prodotto è richiesto")]
    #[Validate("min:1", message: "Il prezzo del prodotto è troppo basso")]
    #[Validate("max:10", message: "Il prezzo del prodotto è troppo alto")]
    public $price;

    #[Validate("required", message: "La descrizione del prodotto è richiesto")]
    #[Validate("min:10", message: "La descrizione del prodotto è troppo breve")]
    public $body;

    #[Validate("required", message: "Scegli almeno una categoria")]
    public $categorySelect = [];

    public $images = [];
    public $temporary_images = [];



    public function createProduct()
    {
        $this->validate();

        // Creazione del prodotto
        $this->product = Product::create([
            'title' => $this->title,
            'price' => $this->price,
            'body' => $this->body,
            'category_id' => $this->categorySelect,
            'user_id' => Auth::id()
        ]);

        // Caricamento immagini SE presenti
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "products/{$this->product->id}";
                $newImage = $this->product->images()->create(['path' => $image->store($newFileName, 'public')]);

                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionLabelImage($newImage->id),
                    new GoogleVisionSafeSearch($newImage->id),
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        // Pulizia del form e reindirizzamento
        $this->cleanForm();
        return redirect(route('productIndex'))->with('prodottoCaricato', 'Prodotto creato con successo, in attesa di approvazione');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-product', compact('categories'));
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            "temporary_images.*" => "image|max:1024",
            "temporary_images" => "max:6",
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    protected function cleanForm()
    {
        $this->reset(['title', 'price', 'body', 'categorySelect', 'images', 'temporary_images']);
    }
}
