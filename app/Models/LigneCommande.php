<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $fillable = ['commande_id', 'product_id', 'qte'];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
    public function article()
    {
        return $this->belongsTo(Product::class);
    }
}
