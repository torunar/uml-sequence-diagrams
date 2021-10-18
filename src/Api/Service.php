<?php

namespace Torunar\WebSequenceDiagrams\Api;

use ErrorException;
use Torunar\WebSequenceDiagrams\Diagram;
use Torunar\WebSequenceDiagrams\Presentation\Diagram\DiagramPresentation;

class Service
{
    private Client $client;

    public function __construct(?Client $client = null)
    {
        $this->client = $client ?? new Client();
    }

    /**
     * @param \Torunar\WebSequenceDiagrams\Diagram $diagram
     * @param array                                $options
     *
     * @return string
     * @throws \ErrorException
     */
    public function render(Diagram $diagram, array $options = []): string
    {
        $request = array_merge([
            'style'  => 'default',
            'format' => 'png',
        ], $options);

        $request['message'] = (string) new DiagramPresentation($diagram);

        $response = $this->client->send($request);
        if (!empty($response['errors'])) {
            throw new ErrorException(
                'WebSequenceDiagrams.com reported syntax error: ' . implode(PHP_EOL, $response['errors'])
            );
        }

        return $this->client->getConfig()->getBaseUrl() . $response['img'];
    }
}
