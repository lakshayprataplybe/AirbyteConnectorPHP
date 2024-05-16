<?php

namespace Lybe\AirbyteConnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AirbyteConnector
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('airbyte.host'), // Change this to your local Airbyte instance URI
            'timeout'  => 10,
            'auth' => [config('airbyte.username'), config('airbyte.password')],
            'headers' => [
                'Accept' => 'application/json',
                // Add any other headers if needed
            ],
        ]);
    }

    // Fetch all workspaces
    public function getWorkspaces()
    {
        return $this->request('GET', 'workspaces');
    }

    // Fetch a workspace by id
    public function getWorkspaceById(string $workspaceId)
    {
        return $this->request('GET', "workspaces/{$workspaceId}");
    }

    // Create a new workspace
    public function createWorkspace(array $data)
    {
        return $this->request('POST', 'workspaces', $data);
    }

    // Update a workspace
    public function updateWorkspace(string $workspaceId, array $data)
    {
        return $this->request('PUT', "workspaces/{$workspaceId}", $data);
    }

    // Delete a workspace
    public function deleteWorkspace(string $workspaceId)
    {
        return $this->request('DELETE', "workspaces/{$workspaceId}");
    }

    // Fetch all sources
    public function getSources()
    {
        return $this->request('GET', 'sources');
    }

    // Fetch a source by id
    public function getSourceById(string $sourceId)
    {
        return $this->request('GET', "sources/{$sourceId}");
    }

    // Create a new source
    public function createSource(array $data)
    {
        return $this->request('POST', 'sources', $data);
    }

    // Update a source
    public function updateSource(string $sourceId, array $data)
    {
        return $this->request('PUT', "sources/{$sourceId}", $data);
    }

    // Delete a source
    public function deleteSource(string $sourceId)
    {
        return $this->request('DELETE', "sources/{$sourceId}");
    }

    // Fetch all destinations
    public function getDestinations()
    {
        return $this->request('GET', 'destinations');
    }

    // Fetch a destination by id
    public function getDestinationById(string $destinationId)
    {
        return $this->request('GET', "destinations/{$destinationId}");
    }

    // Create a new destination
    public function createDestination(array $data)
    {
        return $this->request('POST', 'destinations', $data);
    }

    // Update a destination
    public function updateDestination(string $destinationId, array $data)
    {
        return $this->request('PUT', "destinations/{$destinationId}", $data);
    }

    // Delete a destination
    public function deleteDestination(string $destinationId)
    {
        return $this->request('DELETE', "destinations/{$destinationId}");
    }

    // General method to make API requests
    protected function request($method, $endpoint, $data = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, ['json' => $data]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
