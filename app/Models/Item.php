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

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
