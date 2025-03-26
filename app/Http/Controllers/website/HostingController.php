<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Services\QuickHostService;
use Illuminate\Http\Request;

class HostingController extends Controller
{
    protected $quickHostService;

    public function __construct(QuickHostService $quickHostService)
    {
        $this->quickHostService = $quickHostService;
    }

    public function create(Request $request)
    {
        $domain = $request->input('domain');
        $package = $request->input('package');
        $result = $this->quickHostService->createHosting($domain, $package);
        return response()->json($result);
    }

    public function getPlans()
    {
        $plans = $this->quickHostService->getHostingPlans();
        return response()->json($plans);
    }
}
