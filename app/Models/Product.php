<?php

namespace App\Models;

use App\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ProductScope);
    }
}
