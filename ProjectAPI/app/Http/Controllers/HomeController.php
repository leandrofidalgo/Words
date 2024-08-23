<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        // $response = $client->request('GET', 'https://wordsapiv1.p.rapidapi.com/words/lovely/synonyms', [
        //     'headers' => [
        //         'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',

        //     ],
        //     'verify' => storage_path('cacert.pem'),
        // ]);
        // $data = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'https://api.datamuse.com/words?rel_syn=animals', [
            'headers' => [
            ],
            'verify' => storage_path('cacert.pem'),
        ]);
        dump($response);


        // return inertia('Home', [
        //      'synonyms' => $data
        // ]);
    }
}
