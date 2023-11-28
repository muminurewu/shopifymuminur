<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ProductController extends Controller
{
    public function index(){
        $shop = Auth::user();
        $data = $shop->api()->rest('GET', '/admin/products.json');

        $products = $data['body']->products;

        return view('welcome', compact('products'));
     }
}


/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $shop = Auth::user();

            // Make the API request
            $response = $shop->api()->rest('GET', '/admin/products.json');

            // Log the entire API response
            Log::info('Shopify API Response:', ['response' => $response]);

            // Check if the request was successful (status code 2xx)
            if ($response['status'] >= 200 && $response['status'] < 300) {
                $data = json_decode($response['body']);

                // Check if 'products' property exists in the response
                if (isset($data->products)) {
                    $products = $data->products;
                    return view('products.index', compact('products'));
                } else {
                    // Handle the case where 'products' property is not present in the response
                    Log::error('Products key not found in response. Shopify API Response:', ['response' => $response]);
                    return response()->json(['error' => 'Products key not found in response'], 500);
                }
            } else {
                // Log and return the actual Shopify error
                Log::error('Failed to retrieve products. Shopify API Response:', ['response' => $response]);
                return response()->json(['error' => json_decode($response['body'])->error], $response['status']);
            }
        } catch (\Exception $e) {
            // Log and handle any exceptions
            Log::error('An error occurred:', ['exception' => $e]);
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}


/*
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $shop = Auth::user();

        // Make the API request
        $response = $shop->api()->rest('GET', '/admin/products.json');

        // Check if the request was successful
        if ($response['status'] !== 200) {
            // Handle the error, for example:
            return response()->json(['error' => 'Failed to retrieve products'], $response['status']);
        }

        // Decode the response body
        $data = json_decode($response['body'], true);

        // Check if the 'products' key exists in the response
        if (isset($data['products'])) {
            $products = $data['products'];
            return view('products.index', compact('products'));
        } else {
            // Handle the case where 'products' key is not present in the response
            return response()->json(['error' => 'Products key not found in response'], 500);
        }
    }
}

*/
