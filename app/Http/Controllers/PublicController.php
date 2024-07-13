<?php

namespace App\Http\Controllers;

use App\Mail\MailRevisor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home() {
        $products = Product::where('is_approved', 1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('products'));
    }

    public function chiSiamo() {
        return view('chiSiamo');
    }

    public function contact() {
        return view ('mail.contact');
    }

    public function submitContact(Request $request ) {
        $email = $request->input('email');
        $name = $request->input('name');
        $body = $request->input('body');
        $content = compact('email', 'name', 'body');
        Mail::to('Laravengers@libero.it')->send(new MailRevisor(Auth::user(), $content));
        return redirect(route('home'))->with('richiestaRevisore', 'Grazie per averci contattato!');
    }


    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
        $products = Product::search($query)->where('is_approved', 1)->paginate(6);
        return view('product.searched', [
            'products' => $products,
            'query' => $query
        ]);
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
