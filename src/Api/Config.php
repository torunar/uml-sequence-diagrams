<?php

namespace Torunar\WebSequenceDiagrams\Api;

class Config
{
    private string $baseUrl;

    private string $apiVersion;

    private ?string $apiKey = null;

    /**
     * @param string|null $apiKey
     * @param string      $baseUrl
     * @param string      $apiVersion
     */
    public function __construct(
        ?string $apiKey = null,
        string $baseUrl = 'https://www.websequencediagrams.com/',
        string $apiVersion = '1'
    ) {
        if ($apiKey !== null) {
            $this->apiKey = $apiKey;
        }

        if ($baseUrl !== null) {
            $this->baseUrl = $baseUrl;
        }

        if ($apiVersion !== null) {
            $this->apiVersion = $apiVersion;
        }
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function usesPremiumFeatures(): bool
    {
        return $this->apiKey !== null;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }
}
