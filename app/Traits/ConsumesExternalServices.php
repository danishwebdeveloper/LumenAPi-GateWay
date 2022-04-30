<?php

/**
 * GuzzleHTTPServices
 */
namespace App\Traits;

// use GuzzleHTTP\Client;

trait ConsumesExternalServices
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->baseUri]);

        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}