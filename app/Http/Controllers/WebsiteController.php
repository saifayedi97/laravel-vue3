<?php

namespace App\Http\Controllers;

use App\Actions\CreateWebsiteAction;
use App\Http\Requests\CreateWebsiteRequest;
use App\Services\WebsiteService;
use Illuminate\Http\Request;
use App\Models\Website;
use function Psy\debug;

class WebsiteController extends Controller
{

    protected WebsiteService $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }


    public function index()
    {
        $websites = Website::all();
        return response()->json($websites);
    }


    public function store(CreateWebsiteRequest $request)
    {
        $website = CreateWebsiteAction::execute($request->validated());
        return response()->json([
            'success' => true,
            'website' => $website,
        ], 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $website = $this->websiteService->getWebsiteById($id);
        // Fetch API data based on the website URL
        $apiData = $this->websiteService->fetchExternalApiData($website->url);

        return response()->json([
            'website' => $website,
            'api_data' => $apiData,
        ]);
    }
}
