<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NamecheapController extends Controller
{

    protected $apiUrl = 'https://api.sandbox.namecheap.com/xml.response';

    public function createTestDomain()
    {
        // Define the API parameters
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.create', // Command to create a domain
            'DomainName' => 'codewiresolutions.com', // Example domain name (use a valid domain name)
            'Years' => 1, // The number of years you want to register the domain for
            'RegistrantFirstName' => 'Test', // Registrant information
            'RegistrantLastName' => 'User',
            'RegistrantEmailAddress' => 'codewiresolutions.com',
            'RegistrantAddress1' => '123 Test St',
            'RegistrantCity' => 'Test City',
            'RegistrantStateProvince' => 'Test State',
            'RegistrantPostalCode' => '12345',
            'RegistrantCountry' => 'US',
            'RegistrantPhone'=>"0023087933900"
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

    public function index()
    {
        // Define the API parameters
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.getTldList', // Correct API Command
        ];

        // Make the API request
        $response = Http::get($this->apiUrl, $params);

        // Log the full API response body for debugging
        \Log::info('Namecheap API Response:', ['response' => $response->body()]);

        // Parse the XML response
        $xml = simplexml_load_string($response->body());

        // Check for errors in the response
        if (isset($xml->Errors) && count($xml->Errors->Error) > 0) {
            // If errors are present, return the error message
            return response()->json(['error' => (string) $xml->Errors->Error]);
        }


        $tlds = $xml->CommandResponse->Tlds->Tld ?? []; // Use the correct path for Tlds

        // Return the list to the view
        return view('namecheap', compact('tlds')); // Pass
    }

    public function showDomainCheckForm()
    {
        return view('namecheap.domain_check_form');
    }

    /**
     * Check domain availability using Namecheap API.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function checkDomainAvailability(Request $request)
    {
        $domain = $request->input('domain'); // Get the domain name from the form input

        // Define the API parameters for domain availability check
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.check', // API Command for checking domain availability
            'DomainList' => $domain, // The domain you want to check
        ];

        // Make the API request to check domain availability
        $response = Http::get('https://api.sandbox.namecheap.com/xml.response', $params);

        // Log the full API response body for debugging
        \Log::info('Namecheap API Response:', ['response' => $response->body()]);

        // Parse the XML response
        $xml = simplexml_load_string($response->body());

        // Check if there are any errors in the response
        if (isset($xml->Errors) && count($xml->Errors->Error) > 0) {
            // If errors are present, return the error message
            return response()->json(['error' => (string) $xml->Errors->Error]);
        }

        // Retrieve the domain availability result from the XML response
        $domainInfo = $xml->CommandResponse->DomainCheckResult;

        // Check if the domain is available
        $isAvailable = (string) $domainInfo['Available'] === 'true'; // Available attribute indicates domain availability

        // If the domain is available, get pricing information
        if ($isAvailable) {
            // Define the API parameters for getting pricing details
            $pricingParams = [
                'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
                'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
                'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
                'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
                'Command' => 'namecheap.users.getPricing',
                'ProductType' => 'DOMAIN',
                'ProductCategory' => 'REGISTER',
            ];

            // Make the API request to get pricing details
            $pricingResponse = Http::timeout(60) // Set the timeout to 60 seconds
    ->get('https://api.sandbox.namecheap.com/xml.response', $pricingParams);

              
            // Log the pricing API response body for debugging
            \Log::info('Pricing API Response:', ['response' => $pricingResponse->body()]);

            // Parse the pricing XML response
            $pricingXml = simplexml_load_string($pricingResponse->body());

            // Check for any pricing errors
            if (isset($pricingXml->Errors) && count($pricingXml->Errors->Error) > 0) {
                return response()->json(['error' => (string) $pricingXml->Errors->Error]);
            }

            // Extract pricing details
            $pricingData = $pricingXml->CommandResponse->UserGetPricingResult->ProductType->ProductCategory->Product;

            // Prepare pricing information for the view
            $pricing = [];
            foreach ($pricingData as $product) {
                foreach ($product->Price as $price) {
                    $pricing[] = [
                        'duration' => (string) $price['Duration'],
                        'price' => (string) $price['Price'],
                        'currency' => (string) $price['Currency'],
                    ];
                }
            }

            // Return the result to the view, including domain availability and pricing info
            return view('namecheap.domain_check_result', compact('domain', 'isAvailable', 'pricing'));
        } else {
            // If the domain is not available, return a message indicating so
            return view('namecheap.domain_check_result', compact('domain', 'isAvailable'));
        }
    }
    public function getDomainInfo(Request $request)
    {
        // Get the domain name from the input
        $domain = $request->input('domain');

        // Define the API parameters
        $params = [
            'ApiUser' => env('NAMECHEAP_API_USER', 'irfan9'),
            'ApiKey' => env('NAMECHEAP_API_KEY', '6754bab8b88a445ca24c3b24ee7d09b8'),
            'UserName' => env('NAMECHEAP_USERNAME', 'irfan9'),
            'ClientIp' => env('NAMECHEAP_CLIENT_IP', '39.53.86.135'),
            'Command' => 'namecheap.domains.getinfo', // API Command to get domain info
            'DomainName' => $domain, // The domain name you want to get info for
        ];

        // Make the API request to Namecheap
        try {
            $response = Http::get('https://api.sandbox.namecheap.com/xml.response', $params);

            // Log the full API response body for debugging
            \Log::info('Namecheap API Response:', ['response' => $response->body()]);

            // Parse the XML response
            $xml = simplexml_load_string($response->body());


            // Check if there are any errors in the response
            if (isset($xml->Errors) && count($xml->Errors->Error) > 0) {
                // If errors are present, return the error message
                return response()->json(['error' => (string) $xml->Errors->Error]);
            }

            // Retrieve the domain info from the XML response
            $domainInfo = $xml->CommandResponse->DomainGetInfoResult;

            dd($domainInfo);

            // Return the domain info to the view
            return view('namecheap.domain_info', compact('domain', 'domainInfo'));

        } catch (\Exception $e) {
            // Log the exception message
            \Log::error('Namecheap API Error: ' . $e->getMessage());

            // Return an error response in case the API call fails
            return response()->json(['error' => 'An error occurred while retrieving domain information.']);
        }
    }

}
