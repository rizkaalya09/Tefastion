<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['seller_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function sales(): HasManyThrough
    {
        return $this->hasManyThrough(Sale::class, Product::class, 'seller_id', 'product_id', 'seller_id', 'id');
    }
}
