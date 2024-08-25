<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        // $response = $client->request('GET', 'https://api.datamuse.com/words?rel_syn=animals', [
        //     'headers' => [
        //     ],
        //     'verify' => storage_path('cacert.pem'),
        // ]);
        // dump($response);

        $response = $client->request('GET', 'https://random-word-api.herokuapp.com/word', [
            'headers' => [
            ],
            'query' => [
                'number' => 1 // You can specify the number of words you want
            ],
            'verify' => storage_path('cacert.pem'),
        ]);
        $word = json_decode($response->getBody(), true);
        //dump($word[0]);

        return inertia('Home', []);
    }

    public function definitionsGame()
    {
        $client = new \GuzzleHttp\Client();

        $words = [
            'apple',
            'sunshine',
            'mountain',
            'river',
            'book',
            'harmony',
            'ocean',
            'wisdom',
            'garden',
            'star',
            'universe',
            'journey',
            'freedom',
            'adventure',
            'knowledge',
            'peace',
            'dream',
            'forest',
            'music',
            'light',
            'dog'
        ];

        $randomKey = array_rand($words);
        $randomWord = $words[$randomKey];

        //dump($randomWord);

        $definitionResponse = $client->request('GET', "https://wordsapiv1.p.rapidapi.com/words/{$randomWord}/definitions", [
            'headers' => [
                'x-rapidapi-host' => 'wordsapiv1.p.rapidapi.com',
                
            ],
            'verify' => storage_path('cacert.pem'),
        ]);
        $data = json_decode($definitionResponse->getBody(), true);
        //dump($data['definitions']);

        return inertia('DefinitionsGame', [
            'word' => 'dog',
            'definitions' => $data['definitions']
        ]);
    }
}
