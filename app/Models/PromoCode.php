<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\User;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'restaurant_id',
        'montant',
        'pourcentage',
        'date_debut',
        'date_fin',
    ];

    /**
     * Relation avec l'utilisateur qui a passé la commande
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le restaurant concerné par la commande
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Calcule le montant total de la commande
     */
    public function calculateTotal(): float
    {
        return $this->montant;
    }

}
