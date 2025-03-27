<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResellService;

class DomainController extends Controller
{
    protected $resellService;

    public function __construct(ResellService $resellService)
    {
        $this->resellService = $resellService;
    }

    public function search(Request $request)
    {
        $domain = $request->input('domain');
        $result = $this->resellService->searchDomain($domain);
        return response()->json($result);
    }

    public function register(Request $request)
    {
        $domain = $request->input('domain');
        $userData = $request->input('user');
        $result = $this->resellService->registerDomain($domain, $userData);
        return response()->json($result);
    }
}
