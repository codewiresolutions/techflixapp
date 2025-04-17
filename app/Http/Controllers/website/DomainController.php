<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class DomainController extends Controller
{

    public function search()
    {

        return view('website.pages.domain.index');
    }
    public function register(Request $request)
    {
        $domain = $request->input('domain');

        if (!$domain) {
            return back()->withErrors(['domain' => 'Domain is required']);
        }

        $domainParts = explode('.', $domain);
        $domainName = $domainParts[0];

        // Build query for premium domain check
        $query = http_build_query([
                'auth-userid' => env('API_USERID', '1098591'),
                'api-key' => env('API_KEY', 'sFE9hHAlHVQtpmJawqOnLUZNRpIjQZQA'),
                'key-word' => $domainName,
            ]) . '&tlds=com&tlds=net&tlds=org';

        try {
            $response = Http::get("https://domaincheck.httpapi.com/api/domains/premium/available.xml?$query");

            if ($response->failed()) {
                return back()->withErrors(['msg' => 'Failed to connect to domain API']);
            }

            // Parse XML response
            $xml = new SimpleXMLElement($response->body());


            $results = [];

            foreach ($xml->entry as $entry) {
                $results[] = [
                    'domain' => (string) $entry->string[0],
                    'price' => (float) $entry->string[1]
                ];
            }

            return view('website.pages.domain.index', compact('results'));

        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error processing domain search: ' . $e->getMessage()]);
        }
    }


}
