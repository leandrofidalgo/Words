<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://wordsapiv1.p.rapidapi.com/words/lovely/synonyms', [
            'headers' => [
                'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
                'x-rapidapi-key' => '36e7b9b593msh943dcee37d146d1p1ee465jsn3e0f8061dd40',
            ],
            'verify' => storage_path('cacert.pem'),
        ]);
        $data = json_decode($response->getBody(), true);


        return inertia('Home', [
             'synonyms' => $data
        ]);
    }
}
