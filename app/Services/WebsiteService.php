<?php

namespace App\Services;

use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WebsiteService
{
    public function getWebsiteById($id): ?Website
    {
        return Website::find($id);
    }

    public function fetchExternalApiData(Website $website): array
    {
        // Ensure website has a URL before making the request
        if (!$website->url) {
            return ['error' => 'Website URL is missing'];
        }

        $apiUrl = $website->url . '/index.php?eID=projectSync&token=abc123';

        $response = Http::get($apiUrl);
        dd($response);

        return $response->successful() ? $response->json() : ['error' => 'Failed to fetch data'];
    }
}
