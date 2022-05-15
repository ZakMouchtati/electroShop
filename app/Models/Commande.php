<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['payment', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
}
