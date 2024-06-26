<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = 50;

        $client = new Client([
            'verify' => false, // Disable SSL verification
        ]);
        $response = $client->get('https://dummyjson.com/products', [
            'query' => [
                'limit' => $limit,
                'skip' => ($page - 1) * $limit
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $products = $data['products'];
        $total = $data['total'];
        $lastPage = ceil($total / $limit);

        return view('\welcome', [
            'products' => $products,
            'currentPage' => $page,
            'lastPage' => $lastPage
        ]);

    }

    public function produk($id)
    {
        $client = new Client([
            'verify' => false, // Disable SSL verification
        ]);

        $response = $client->get('https://dummyjson.com/products/'.$id);

        $data = json_decode($response->getBody()->getContents(), true);

        return view('/produk',compact('data'));
    }
}
