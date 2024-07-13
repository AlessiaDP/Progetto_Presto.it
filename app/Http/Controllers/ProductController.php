<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('is_approved', 1)->orderBy('created_at', 'desc')->get();
        return view('product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }

    public function prodByCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->where('is_approved', 1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('product.category', compact('products', 'category'));
    }

    public function prodByUser(User $user)
    {
        return view('product.user', compact('user'));
    }

    public function addFavorite($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        if (!$user->hasFavorite($product)) {
            $user->addFavorite($product);
            return redirect()->back()->with('aggiuntoPreferito', 'Prodotto aggiunto ai preferiti')->withFragment('favorite-section');
        }
        return redirect()->back()->with('message', 'Prodotto già nei preferiti')->withFragment('favorite-section');
    }

    public function removeFavorite($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        if ($user->hasFavorite($product)) {
            $user->removeFavorite($product);
            return redirect()->back()->with('rimossoPreferito', 'Prodotto rimosso dai preferiti')->withFragment('unfavorite-section');
        }
        return redirect()->back()->with('message', 'Prodotto non nei preferiti')->withFragment('unfavorite-section');
    }

    public function favorites()
    {
        $user = Auth::user();
        $products = $user->favoriteProducts;
        return view('product.favorites', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('home'))->with('prodottoEliminato', 'Prodotto eliminato');
    }
}
