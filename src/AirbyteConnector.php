<?php
/*
 * Copyright © Lybe Sweden AB 2024
 */

namespace Lybe\AirbyteConnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class AirbyteConnector
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('airbyte.host'), // Change this to your local Airbyte instance URI
            'timeout' => 10,
            'auth' => [config('airbyte.username'), config('airbyte.password')],
            'headers' => [
                'Accept' => 'application/json',
                // Add any other headers if needed
            ],
        ]);
    }

    public function getWorkspaces(): array
    {
        return $this->request('GET', 'workspaces');
    }

    public function getWorkspaceById(string $workspaceId): array
    {
        return $this->request('GET', "workspaces/{$workspaceId}");
    }

    public function createWorkspace(array $data): array
    {
        return $this->request('POST', 'workspaces', $data);
    }

    public function updateWorkspace(string $workspaceId, array $data): array
    {
        return $this->request('PUT', "workspaces/{$workspaceId}", $data);
    }

    public function deleteWorkspace(string $workspaceId): void
    {
        $this->request('DELETE', "workspaces/{$workspaceId}");
    }

    public function getSources(): array
    {
        return $this->request('GET', 'sources');
    }

    public function getSourceById(string $sourceId): array
    {
        return $this->request('GET', "sources/{$sourceId}");
    }

    public function createSource(array $data): array
    {
        return $this->request('POST', 'sources', $data);
    }

    public function updateSource(string $sourceId, array $data): array
    {
        return $this->request('PUT', "sources/{$sourceId}", $data);
    }

    public function deleteSource(string $sourceId): array
    {
        return $this->request('DELETE', "sources/{$sourceId}");
    }

    public function getDestinations(): array
    {
        return $this->request('GET', 'destinations');
    }

    public function getDestinationById(string $destinationId): array
    {
        return $this->request('GET', "destinations/{$destinationId}");
    }

    public function createDestination(array $data): array
    {
        return $this->request('POST', 'destinations', $data);
    }

    public function updateDestination(string $destinationId, array $data): array
    {
        return $this->request('PUT', "destinations/{$destinationId}", $data);
    }

    public function deleteDestination(string $destinationId): array
    {
        return $this->request('DELETE', "destinations/{$destinationId}");
    }

    public function getConnections(): array
    {
        return $this->request('GET', 'connections');
    }

    public function getConnectionById(string $connectionId): array
    {
        return $this->request('GET', "connections/{$connectionId}");
    }

    public function createConnection(array $data): array
    {
        return $this->request('POST', 'connections', $data);
    }

    public function updateConnection(string $connectionId, array $data): array
    {
        return $this->request('PUT', "connections/{$connectionId}", $data);
    }

    public function deleteConnection(string $connectionId): array
    {
        return $this->request('DELETE', "connections/{$connectionId}");
    }

    /**
     * @throws GuzzleException
     */
    protected function request($method, $endpoint, $data = []): array
    {
        $response = $this->client->request($method, $endpoint, ['json' => $data]);
        return json_decode($response->getBody()->getContents(), true);

    }
}
