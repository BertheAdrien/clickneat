<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = [
        "name",
        "category_id",
        "cost",
        "price" 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
