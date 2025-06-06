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
        
        $this->routes = array_merge([
            'pages' => 'client/pages',
            'page' => 'client/page',
        ], $routes);
    }

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

    public function setRoutes(array $routes): void
    {
        $this->routes = array_merge($this->routes, $routes);
    }
} 