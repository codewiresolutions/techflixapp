<?php

namespace App\Services;
use GuzzleHttp\Client;
class ResellService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('RESSELL_BIZ_API_KEY');
    }

    public function searchDomain($domain)
    {
        $response = $this->client->post('https://api.resell.biz/v1/domain/search', [
            'json' => [
                'api_key' => $this->apiKey,
                'domain' => $domain,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function registerDomain($domain, $userData)
    {
        $response = $this->client->post('https://api.resell.biz/v1/domain/register', [
            'json' => [
                'api_key' => $this->apiKey,
                'domain' => $domain,
                'user' => $userData,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
