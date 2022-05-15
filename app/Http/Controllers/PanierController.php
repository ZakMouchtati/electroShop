<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::exists('panier')) {
            return null;
        }
        $products = Session::get('panier');
        $listProduit = [];
        $total = 0;
        foreach ($products as $produit) {
            $item = $this->show($produit->slug);
            $item->qte = $produit->qte;
            $listProduit = [...$listProduit, $item];
            $total += $item->price * $item->qte;
        }
        dd($total);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit = new Panier();
        $produit->qte = $request->qte;
        $produit->id = $request->id;
        $produit->slug = $request->slug;
        $products = $produit;
        if (!Session::exists('panier')) {
            $products = [$produit];
            Session::put('panier', $products);
        } else {
            $products = Session::get('panier');
            foreach ($products as $item) {
                if ($item->id == $produit->id) {
                    $item->qte += $request->qte;
                    $produit = $item;
                    break;
                }
            }
            $products = [...$products, $produit];
            Session::put('panier', $products);
        }
        return redirect()->back()->with([
            'status' => 'Your Product Has been added Successful To Your Cart',
            'class' => 'msg-succes'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with(['pictures', 'category'])
            ->whereHas('pictures', function ($query) {
                return $query->where('etat', true);
            })->first();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::exists('panier')) {
            return "ok";
        } else {
            return 'not';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Session::get('panier');
        foreach ($products as $item) {
            if ($item->id == $id) {
                $item->qte = $request->qte;
            }
        }
        Session::put('panier', $products);
        return response()->json([
            'product' => $products,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Session::exists('panier')) {
            $listProduit = Session::get('panier');
            foreach ($listProduit as $produit) {
                if ($produit->id == $id) {
                    unset($listProduit[array_search($produit, $listProduit)]);
                    Session::put('panier', $listProduit);
                    break;
                }
            }
        };
        return redirect()->back()->with([
            'status' => 'Your Product Has been Deleted In Your Cart',
            'class' => 'msg-danger'
        ]);
    }
}
