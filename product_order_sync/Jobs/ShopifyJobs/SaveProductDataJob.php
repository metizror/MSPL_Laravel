<?php

namespace App\Jobs\ShopifyJobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class SaveProductDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     public $product_value;

    public function __construct($product_value)
    {
        $this->product_value = $product_value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $products = $this->product_value;
    	$product_value = $products['product_value'];
        
        $shopify_product_id = (string)$product_value['id'];
        
        /*foreach ($product_value['variants'] as $product_variant_key => $product_variant_value) 
        {
           
            $shopify_variant_id = (string)$product_variant_value['id'];*/
            
            $variant_data = [
                'product_id'        => $shopify_product_id,
                'variant_id'        => $shopify_variant_id,
                //'inventory_item_id' => $product_variant_value['inventory_item_id'],
                //'price'             => $product_variant_value['price'],
                //'compare_at_price'  => $product_variant_value['compare_at_price'],
                'price_tag'         => $product_value['tags'],
                'tag'               => $product_value['tags'],
                //'sku'               => $product_variant_value['sku'],
                'title'             => $product_value['title'],
                'handle'            => $product_value['handle'],
                'body_html'         => $product_value['body_html'],
                'vendor'            => $product_value['vendor'],
                'product_type'      => $product_value['product_type']
                
            ];
            
            $product_variant_data = Product::firstOrNew(['product_id'=>$shopify_product_id]);
            $product_variant_data->fill($variant_data);
            $product_variant_data->save();
       /* }*/
    }
}
