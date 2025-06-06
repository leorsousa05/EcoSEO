<?php

namespace App\Core;

interface ApiClientInterface
{
    public function getAllPages(): ?array;
    public function getPageByUrl(string $url): ?object;
    public function getPageMetadata(string $url): ?array;
}

class ApiClient implements ApiClientInterface
{
    private string $baseUrl;
    private string $apiToken;
    private array $defaultHeaders;
    private array $routes;

    public function __construct(
        string $baseUrl = '',
        string $apiToken = '',
        array $routes = []
    ) {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiToken = $apiToken;
        $this->defaultHeaders = [
            'Authorization: Bearer ' . $this->apiToken
        ];
        
        // Default routes in English
        $this->routes = array_merge([
            'pages' => 'client/pages',
            'page' => 'client/page',
        ], $routes);
    }

    /**
     * Make a request to the API
     * 
     * @param string $endpoint The API endpoint to call
     * @param string $method HTTP method (GET, POST, etc)
     * @param array $data Optional data to send with the request
     * @return array|object|null The decoded JSON response or null on error
     * @throws \Exception When the request fails
     */
    private function makeRequest(string $endpoint, string $method = 'GET', array $data = []): array|object|null
    {
        $curl = curl_init();
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->defaultHeaders,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0,
        ];

        if (!empty($data)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
            $options[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
        }

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new \Exception("API Request Error: " . $err);
        }

        if ($httpCode >= 400) {
            throw new \Exception("API Error: HTTP $httpCode - " . $response);
        }

        $decoded = json_decode($response);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("JSON Decode Error: " . json_last_error_msg());
        }

        return $decoded;
    }

    /**
     * Get all pages from the API
     * 
     * @return array|null Array of pages or null on error
     * @throws \Exception When the request fails
     */
    public function getAllPages(): ?array
    {
        try {
            $response = $this->makeRequest($this->routes['pages']);
            return is_array($response) ? $response : null;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * Get a specific page by URL
     * 
     * @param string $url The page URL
     * @return object|null The page data or null on error
     * @throws \Exception When the request fails
     */
    public function getPageByUrl(string $url): ?object
    {
        try {
            $response = $this->makeRequest($this->routes['page'] . '/' . urlencode($url));
            return is_object($response) ? $response : null;
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * Get page metadata (title, description, etc)
     * 
     * @param string $url The page URL
     * @return array|null The page metadata or null on error
     */
    public function getPageMetadata(string $url): ?array
    {
        $page = $this->getPageByUrl($url);
        
        if (!$page) {
            return null;
        }

        return [
            'title' => $page->name ?? '',
            'description' => $page->description ?? '',
            'h1' => $page->name ?? '',
            'content' => $page->content ?? '',
            'cover' => $page->cover ?? '',
            'gallery' => $page->galleryItem ?? []
        ];
    }

    /**
     * Set custom routes for the API
     * 
     * @param array $routes Array of route mappings
     * @return void
     */
    public function setRoutes(array $routes): void
    {
        $this->routes = array_merge($this->routes, $routes);
    }
} 