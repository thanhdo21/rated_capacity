<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HandleString;
use Illuminate\Support\Carbon;
class Product extends Model
{
    use HasFactory,HandleString;
    protected $fillable = [
        'store_id', 'product_name', 'description', 'price', 'stock_quantity', 'sku',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $storeInitials= self::GetInitials($product->store->store_name); // Get the store's abbreviation
            $productInitials= self::GetInitials($product->product_name); // Get the abbreviation of the product
            $product->sku = 'SKU' . $productInitials. $storeInitials.microtime(true);
        });
    }

    //Set relationship with store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
