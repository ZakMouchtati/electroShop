<?php

namespace App\View\Composers;

use App\Http\Controllers\PanierController;
use App\Models\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CategoryCompose
{
    public function compose(View $view)
    {
        $categories = Cache::remember('categories', now()->addDay(3), function () {
            return Category::all();
        });
        $listproduit = [];
        $total = 0;
        $itemselected = 0;
        if (Session::exists('panier')) {
            $ProductController = new PanierController();
            $products = Session::get('panier');
            foreach ($products as $produit) {
                $item = $ProductController->show($produit->slug);
                $item->qte = $produit->qte;
                $listproduit = [...$listproduit, $item];
                $total += $item->price * $item->qte;
                $itemselected += $item->qte;
            }
            Session::put("listproduit", $listproduit);
        }
        $view->with([
            'categories' => $categories,
            'listproduit' => $listproduit,
            'total' => $total,
            'itemselected' => $itemselected
        ]);
    }
}
