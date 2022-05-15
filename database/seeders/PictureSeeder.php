<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $pictures = [
            'pictures/vDY5e2Bf0evHIoNH7r3aIUbKoknjVXqIfLezynnp.png',
            'pictures/bfyklv3hOb5dn0Rkzx6WgbqpQc3xHO9uEw2PpILc.png',
            'pictures/8aycE94zQyW60dWn8mRpQI2m3azlQnF9Holom5o2.png',
            'pictures/IV2FecaxyOlcIrfNa40btS1s8t7piPDycZnalmVq.png',
            'pictures/z4YqZulLBZtbmvCSfbjJoFWXrcyym1ZYQwal9Z0G.png',
            'pictures/fTbJxSFlA8ImzJsFHS2xDpI3T13f3fUfFN98PO45.png',
            'pictures/tpcIVlFIZ01NuaHuxI3SD1A9j4MCG35DYliDxKAh.png',
            'pictures/Wvbw1CMShf5qP9SjFeeyWWHlQahDSZWKMCm9lxao.png',
            'pictures/JCtGwdsm2F8pFReFMphKTnk258pg2QeQockQHND0.png',
            'pictures/0Azmeg57Ptbv7WKyKbLNd3nu4fvQpetgkYX7zftD.png',
            'pictures/NAVPg8YHbwTM1aRxYY2D0mvR9dP5Mb5lEZKS5Vg0.png',
            'pictures/4uRlNcDWWgwCKgdiIalj5NZAjOcz1quAtU5VN2Za.png'
        ];
        $products->each(function ($product) use ($pictures) {
            $picture = new Picture();
            $picture->path = $pictures[random_int(1, 8)];
            $picture->product_id = $product->id;
            $picture->save();
        });
    }
}
