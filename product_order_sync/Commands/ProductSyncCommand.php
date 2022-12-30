<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ShopifyJobs\SaveProductDataJob;
use App\Http\Traits\ShopifyCurlTrait;

class ProductSyncCommand extends Command
{
    use ShopifyCurlTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ProductSyncCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get products from shopify and Sync in Product table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $shopify_api_url = SHOPIFY_API_URL;
        
        $product_url = $shopify_api_url."admin/products.json";
          
        $products = [
            'product_url' => $product_url
        ];


        $response = $this->getCurlWithHeader($product_url);
       
        $response_body = $response['response_body']; 
        

        $response = $response_body ;
        if(isset($response['products']))
        {  
            foreach ($response['products'] as $product_key => $product_value) {
                $product_data = [
                    'product_value' => $product_value
                ];
                dispatch(new SaveProductDataJob($product_data));
            }
        }
             
    }
}
