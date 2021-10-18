<?php

namespace Torunar\WebSequenceDiagrams\Api;

class Client
{
    private Config $config;

    public function __construct(?Config $config = null)
    {
        $this->config = $config ?? new Config();
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function send(array $payload): array|null
    {
        $payload['apiVersion'] = $payload['apiVersion'] ?? $this->config->getApiVersion();
        if ($this->config->usesPremiumFeatures()) {
            $payload['apikey'] = $this->config->getApiKey();
        }

        $curlHandle = curl_init($this->config->getBaseUrl() . '?' . http_build_query($payload));
        curl_setopt($curlHandle, CURLOPT_POST, true);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlHandle);
        curl_close($curlHandle);

        return json_decode($response, true);
    }
}
