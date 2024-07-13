<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function revisorIndex()
    {
        $product_to_check = Product::where('is_approved', 0)->first();
        return view('revisor.index', compact('product_to_check'));
    }

    public function revisorApprove(Product $product)
    {
        $product->previous_approval_status = $product->is_approved;
        $product->is_approved = 1;
        $product->save();
        return redirect(route('revisorIndex'))->with('prodottoApprovato', 'Prodotto approvato, aggiunto al catalogo');
    }

    public function revisorReject(Product $product)
    {
        $product->previous_approval_status = $product->is_approved;
        $product->is_approved = 2;
        $product->save();
        return redirect(route('revisorIndex'))->with('prodottoRifiutato', 'Prodotto rifiutato, spostato nel cestino');
    }

    public function undoAction(Product $product)
    {
        if ($product->is_approved == 0) {
            $last_product = Product::orderBy('created_at', 'desc')
                ->where('is_approved', 1)
                ->orWhere('is_approved', 2)
                ->first();

            if ($last_product) {
                $last_product->is_approved = 0;
                $last_product->previous_approval_status = null;
                $last_product->save();

                return redirect()->back()->with('undoSuccess', 'Ultima azione annullata con successo.');
            }
        }
        return redirect()->back()->with('undoFailed', 'Nessuna azione precedente da annullare.');
    }








    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back()->with('revisorCreated', 'Utente creato come revisore');
    }
}
