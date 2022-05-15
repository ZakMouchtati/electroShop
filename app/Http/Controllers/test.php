<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class test extends Controller
{
    public function store(Request $request)
    {
        $produt = Product::all();

        if ($request->hasFile('picture')) {
            $path = Storage::putFile('pictures', $request->file('picture'));
            $picture = new Picture();
            $picture->path = $path;
            $picture->product_id = $produt->random()->id;
            $picture->save();
        }
        return view("welcome");
    }
    public function create()
    {
        return view("welcome");
    }
}
