<?php

namespace Paymongo;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PaymentIntents
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function create($data)
    {
        try {
            $response = $this->httpClient->post('payment_intents', [
                'json' => $data
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle request exception
            return null;
        }
    }
}

class Webhooks
{
    private $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function constructEvent($payload, $signatureHeader, $webhookSecretKey)
    {
        try {
            $response = $this->httpClient->post('webhooks/construct_event', [
                'json' => [
                    'payload' => $payload,
                    'signature_header' => $signatureHeader,
                    'webhook_secret_key' => $webhookSecretKey
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle request exception
            return null;
        }
    }
}
?>

