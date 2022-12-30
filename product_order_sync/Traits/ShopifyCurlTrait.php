<?php

namespace App\Http\Traits;

use App\Models\ShopifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait ShopifyCurlTrait
{

    public function getCurlWithHeader($url)
    {

        $response = Http::get($url);
        $jsonData = $response->json();
        $response = json_decode(json_encode($jsonData), true);
        return [
            'response_body' => $response
        ];

        
    }
}
