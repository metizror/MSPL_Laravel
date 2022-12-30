<?php

namespace App\Jobs\ShopifyJobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;


class SaveOrderlistJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $order_value;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_value)
    {
        $this->order_value = $order_value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orders = $this->order_value;
    	$order_value = $orders['order_value']; 
        $shopify_order_id = (string)$order_value['id'];
        if(isset($order_value))
        { 
            
            $order_data = [
                'shopify_order_id'     => $order_value['id'],
                'email'                => $order_value['email'],
                'shopify_order_number' => $order_value['number'],
                'note'                 => $order_value['note'],
                'token'                => $order_value['token'],
                'price'                => $order_value['total_price'],
                'subtotal_price'       => $order_value['subtotal_price'],
                'total_tax'            => $order_value['total_tax'],
                'financial_status'     => $order_value['financial_status'],
                'total_discounts'      => $order_value['total_discounts'],
                'name'                 => $order_value['name'],
                'app_id'               => $order_value['app_id'],
                'fulfillment_status'   => $order_value['fulfillment_status'],
                'tags'                 => $order_value['tags']
            ];

            
            
            $orders_data = Order::firstOrNew(['shopify_order_id'=>$shopify_order_id]);
            
            $orders_data->fill($order_data);
            $orders_data->save(); 

        }
       
    }
}
