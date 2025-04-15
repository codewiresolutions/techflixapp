<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DomainController extends Controller
{

    public function search()
    {

        return view('website.pages.domain.index');
    }
    public function searchdomain(Request $request)
    {

    }

    public function register(Request $request)
    {
        $domain = $request->input('domain');
        $userData = $request->input('user');
        $result = $this->resellService->registerDomain($domain, $userData);
        return response()->json($result);
    }
}
