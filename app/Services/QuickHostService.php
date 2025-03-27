<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class QuickHostService
{

    protected $client;
    protected $apiKey;
    protected $apiUrl;
    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('QUICKHOST_API_KEY');



        // Initialize the $apiUrl property based on sandbox mode
        $this->apiUrl = env('NAMECHEAP_SANDBOX') === 'true'
            ? 'https://api.sandbox.namecheap.com/xml.response'
            : 'https://api.sandbox.namecheap.com/xml.response';
    }

    public function createHosting($domain, $package)
    {
        $response = $this->client->post('https://api.quickhostbd.com/v1/hosting/create', [
            'json' => [
                'api_key' => $this->apiKey,
                'domain' => $domain,
                'package' => $package,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function createTestDomain()
    {
        // Define the API parameters
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.create', // Command to create a domain
            'DomainName' => 'testdomain12345', // Example domain name (use a valid domain name)
            'Years' => 1, // The number of years you want to register the domain for
            'RegistrantFirstName' => 'Test', // Registrant information
            'RegistrantLastName' => 'User',
            'RegistrantEmailAddress' => 'testuser@example.com',
            'RegistrantAddress1' => '123 Test St',
            'RegistrantCity' => 'Test City',
            'RegistrantStateProvince' => 'Test State',
            'RegistrantPostalCode' => '12345',
            'RegistrantCountry' => 'US',
            // Add more required parameters based on Namecheap API documentation
        ];

        // Send the API request
        $response = Http::get($this->apiUrl, $params);

        // Log the response for debugging
        \Log::info('Create Domain Response:', ['response' => $response->body()]);

        // Parse the XML response
        $xml = simplexml_load_string($response->body());

        // Check if domain creation was successful
        if (isset($xml->Errors) && count($xml->Errors->Error) > 0) {
            return response()->json(['error' => 'Error creating domain: ' . (string) $xml->Errors->Error]);
        }

        return response()->json(['success' => 'Test domain created successfully.']);
    }
    public function getHostingPlans()
    {
//        https://api.sandbox.namecheap.com/xml.response/xml.response?ApiUser=irfan9&ApiKey=6754bab8b88a445ca24c3b24ee7d09b8&UserName=irfan9&Command=namecheap.domains.getList&ClientIp=39.53.86.135

//        $url = 'https://api.sandbox.namecheap.com/xml.response' . '?' . http_build_query([
//                'ApiUser' => 'irfan9',
//                'ApiKey' => '6754bab8b88a445ca24c3b24ee7d09b8',
//                'UserName' => 'irfan9',
//                'ClientIp' => '39.53.86.135',
//                'Command' => 'namecheap.domains.getList', // Make sure this command is correct
//            ]);

        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.getList',
        ];
        $response = Http::get($this->apiUrl, $params);

        $xml = simplexml_load_string($response->body());
        \Log::info('Namecheap API Response:', ['response' => $response->body()]);
        // Check for errors in the response (e.g., invalid API key)
        if (isset($xml->Errors)) {
            return response()->json(['error' => 'Failed to retrieve data']);
        }

        // Pass the list of domains to the view
        $domains = $xml->Domains->Domain ?? []; // If there are domains, pass them, else empty array
        return view('namecheap', compact('domains'));

        // Return response body (this could be XML, so you may need to parse it)
        return simplexml_load_string($response->getBody()->getContents());

        if ($response->successful()) {
            dd($response);
            // Decode the response body to a PHP array
            $data = $response->json();

            return response()->json($data);
        } else {
            dd(response()->json());
            // Handle error if the request was not successful
            return response()->json(['error' => 'Unable to fetch data'], 500);
        }
        try {

            $response = $this->client->post('https://api.quickhostbd.com/v1/hosting/plans', [
                'json' => [
                    'api_key' => $this->apiKey,
                ],
                // If you want to debug the request/response, you can use the 'debug' option with a stream
                'debug' => fopen('php://stdout', 'w'), // Log to stdout or specify a file to log the debug info
            ]);

            // Inspect individual parts of the response
            dd($response->getStatusCode(), $response->getBody()->getContents());

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle error and return useful debug information
            return ['error' => $e->getMessage()];
        }
    }

}
