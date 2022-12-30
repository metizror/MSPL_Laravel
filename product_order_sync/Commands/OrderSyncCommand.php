<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ShopifyJobs\SaveOrderlistJob;
use App\Http\Traits\ShopifyCurlTrait;


class OrderSyncCommand extends Command
{
    use ShopifyCurlTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:OrderSyncCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get orders from shopify and Sync in order table';

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

        $order_url = $shopify_api_url."admin/orders.json?status=any";
        
        $response = $this->getCurlWithHeader($order_url);
        
        $response_body = $response['response_body']; 

        $response = $response_body ;
        if(isset($response['orders']))
        {  
            foreach ($response['orders'] as $order_key => $order_value) {
                $order_data = [
                    'order_value' => $order_value
                ];
                dispatch(new SaveOrderlistJob($order_data));
            }
        }       

    }
}
