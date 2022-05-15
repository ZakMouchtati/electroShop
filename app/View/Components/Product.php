<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    public $id;
    public $slug;
    public $category;
    public $name;
    public $price;
    public $path;
    public $rating;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $slug, $category, $name, $price, $path, $rating)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->category = $category;
        $this->name = $name;
        $this->price = $price;
        $this->path = $path;
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
