<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PolygonApiController extends Controller
{
    public function fetchFinancialData()
    {
        $apiKey = 'lxiTwH0IITCFIm2PnbAbSkXgAsO18XyS';
        $url = "https://api.polygon.io/v2/aggs/grouped/locale/us/market/stocks/2023-01-09?adjusted=true&apiKey=$apiKey";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return view('home', ['data' => $data]);
    }
}
