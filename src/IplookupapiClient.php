<?php

namespace Iplookupapi\Iplookupapi;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * Exposes the Iplookupapi library to client code.
 */
class IplookupapiClient
{
    const BASE_URL = 'https://api.iplookupapi.com/v1/';
    const REQUEST_TIMEOUT_DEFAULT = 15; // seconds

    protected Client $httpClient;

    public function __construct(public string $apiKey, ?array $settings = [])
    {
        $guzzle_opts = [
            'http_errors' => false,
            'headers' => $this->buildHeaders($apiKey),
            'timeout' => $settings['timeout'] ?? self::REQUEST_TIMEOUT_DEFAULT
        ];
        if (isset($settings['guzzle_opts'])) {
            $guzzle_opts = array_merge($guzzle_opts, $settings['guzzle_opts']);
        }
        $this->httpClient = new Client($guzzle_opts);
    }

    /**
     * @throws IplookupapiException
     */
    private function call(string $endpoint, ?array $query = [])
    {
        $url = self::BASE_URL . $endpoint;

        try {
            $response = $this->httpClient->request('GET', $url, [
                'query' => $query
            ]);
        } catch (GuzzleException $e) {
            throw new IplookupapiException($e->getMessage());
        } catch (Exception $e) {
            throw new IplookupapiException($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @throws IplookupapiException
     */
    public function status()
    {
        return $this->call('status');
    }

    /**
     * @throws IplookupapiException
     */
    public function info(?array $query = [])
    {
        return $this->call('info', $query);
    }

    /**
     * Build headers for API request.
     * @return array Headers for API request.
     */
    private function buildHeaders($apiKey)
    {
        return [
            'user-agent' => 'Iplookupapi/PHP/0.1',
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'apikey' => $apiKey,
        ];
    }
}
