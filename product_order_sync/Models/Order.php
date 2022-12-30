<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['browntape_order_id', 'email', 'note', 'token', 'financial_status', 'name', 'app_id', 'tags', 'item_count', 'shopify_order_id', 'shopify_order_number', 'shopify_line_item_id', 'shopify_product_id', 'shopify_variant_id', 'sku', 'product_name', 'quantity', 'price', 'fulfillment_status', 'order_status', 'subtotal_price', 'total_discounts', 'tax', 'line_item_payload'];

}
