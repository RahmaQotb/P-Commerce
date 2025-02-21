<?php

namespace App\Services\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LiveScoreService
{
    protected $client;
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = "d6GjPHzTvR4u4moc";
        $this->apiSecret = "VDGi7Vka8EgGAZkN607WHGPdyUHDg5Qc";
        
        // dd($this->apiKey);
    }

    public function getLiveScores()
    {
        try {
            $response = $this->client->request('GET', 'https://livescore-api.com/api-client/competitions/standings.json?competition_id=2&key=d6GjPHzTvR4u4moc&secret=VDGi7Vka8EgGAZkN607WHGPdyUHDg5Qc', [
                'verify' => false, 
                'query' => [
                    'competition_id' => 2,
                    'key' => $this->apiKey,
                    'secret' => $this->apiSecret,
                ],
            ]);
    
            if ($response->getStatusCode() == 200) {
                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);
    
                // dd($data); 
    
                return $data['data']['table'] ?? []; 
            }
    
            throw new \Exception('Error fetching live scores: ' . $response->getBody());
        } catch (RequestException $e) {
            throw new \Exception('Guzzle error: ' . $e->getMessage());
        }
    }
    
    
}
