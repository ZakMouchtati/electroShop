<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $users = User::all();
        Comment::factory(250)->make()->each(function ($comment) use ($products, $users) {
            $comment->product_id = $products->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
