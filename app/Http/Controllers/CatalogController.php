<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('active', true)
            ->orderBy('name')
            ->get()
            ->map(fn ($products) => $products->toCatalogArray());

        $categories = Category::orderBy('name')
            ->get()
            ->map(fn ($categories) => $categories->toCatalogArray());

        return inertia::render('Catalog', [
            'category' => $categories,
            'products' => $products,
            'isHome' => $request->routeIs('home'),
            'initialSearch' => (string) $request->query('q', ''),
            'initialCategorie' => (string) $request->query('categorie', '')
        ]);
    }
}
