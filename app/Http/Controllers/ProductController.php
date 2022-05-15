<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cache::forget('top_selling');
        // Cache::forget('new_product');
        $top_selling = Cache::remember('top_selling', now()->addSecond(3600), function () {
            return Product::with(['pictures', 'category'])->whereHas('pictures', function ($query) {
                return $query->where('etat', true);
            })->withcount('lignecommandes')->withAvg('comments', 'rating')->orderby('LigneCommandes_count')->get();
        });
        $new_product = Cache::remember('new_product', now()->addSecond(3600), function () {
            return Product::with(['pictures', 'category'])->whereHas('pictures', function ($query) {
                return $query->where('etat', true);
            })->take(10)->get();
        });
        // return $top_selling;

        return view('shop.index', [
            'new_product' => $new_product,
            'top_selling' => $top_selling
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        Cache::forget("product/$slug");
        $product = Cache::remember("product/$slug", now()->addDay(1), function () use ($slug) {
            return Product::where('slug', $slug)
                ->with(['pictures', 'category', 'comments', 'comments.user'])
                ->withcount('comments')
                ->withAvg('comments', 'rating')
                ->first();
        });
        $related_products = Product::whereBelongsTo($product->category)->with(['pictures', "category"])->withAvg('comments', 'rating')->take(4)->get();
        return view("shop.show", [
            'product' => $product,
            'related_products' => $related_products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function search(Request $request)
    {
        $products = Product::where('name', 'like', $request->search_query . "%")
            ->orwhere('category_id', $request->category)
            ->get();
        return view(
            'shop.search',
            [
                "products" => $products,
                'key' => $request->search_query
            ]
        );
    }
}
