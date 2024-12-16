<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      
        $products = Product::
                           orderBy('id','DESC')
                           ->paginate(6);
                         

        return view('home', compact('products'));
    }

    public function show(string $slug, Product $product)
    {
        $expectedSlug = $product->slug;

        if ($slug !== $expectedSlug) {
            return redirect()->route('products.show', [
                'slug' => $expectedSlug,
                'product' => $product
            ]);
        }

        return view('products.show',[
            'product' => $product
        ]);
    }
}
