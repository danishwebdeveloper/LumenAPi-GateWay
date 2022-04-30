<?php

namespace App\Traits;
use GuzzleHttp\Client;
trait ConsumesExternalService
{

    public function PerformRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        // First instantiate the guzzle
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl,
            [
                'form_params' => $formParams,
                'headers' => $headers,
            ]);
        return $response->getBody()->getContents();
    }
}