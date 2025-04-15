<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


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
        $response = Http::get('https://domaincheck.httpapi.com/api/domains/available.json', [
            'auth-userid' => env('API_USERID', '1098591'),
            'api-key' => env('API_KEY', 'sFE9hHAlHVQtpmJawqOnLUZNRpIjQZQA'),
            'domain-name' => $domainName,
            'tlds' => 'com',
            'tlds.' => 'net',
        ]);
        $results = $response->json();
        if (isset($results['errorvalue'])) {
            return back()->withErrors(['msg' => $results['errorvalue']['error']]);
        }
        return view('website.pages.domain.index', compact('results'));
    }


}
