<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantiteAchat',
        'prixUnitaire',
        'produit_id',
        'frais',
        'fournisseur_id',
        'user_id',
    ];

    protected $table = 'livraisons';

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
