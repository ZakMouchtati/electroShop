<?php

namespace App\Models;

use App\Scopes\CommentScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'rating', 'user_id', 'product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CommentScope);
        Comment::creating(function ($comment) {
            Cache::forget("product/{$comment->product->slug}");
        });
    }
}
