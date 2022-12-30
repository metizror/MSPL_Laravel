<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variant_id', 'inventory_item_id', 'price', 'compare_at_price', 'percentage', 'price_tag', 'tag', 'sku', 'title', 'handle', 'graphql_product_id', 'body_html', 'vendor', 'product_type', 'images', 'data_json', 'is_continue_selling', 'is_active'];
}
