<?php

namespace Lybe\AirbyteConnector\Tests\Unit;

use Lybe\AirbyteConnector\AirbyteConnector;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class AirbyteConnectorTest extends BaseTestCase
{
    protected AirbyteConnector $airbyte;

    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'airbyte.username' => 'lakshay1',
            'airbyte.password' => 'lakshay@123',
        ]);

        // Replace these values with your actual Airbyte username and password
        $username = config('airbyte.username');
        $password = config('airbyte.password');

        $this->airbyte = new AirbyteConnector($username, $password);
    }

    public function testGetWorkspaces()
    {
        $workspaces = $this->airbyte->getWorkspaces();
        $this->assertIsArray($workspaces);
    }

    public function testGetWorkspaceById()
    {
        // Replace 'workspace_id' with an actual workspace ID for testing
        $workspace = $this->airbyte->getWorkspaceById('workspace_id');
        $this->assertIsArray($workspace);
    }

    public function testCreateWorkspace()
    {
        // Replace $data with an array of workspace data for testing
        $data = [
            // Add workspace data here
        ];
        $workspace = $this->airbyte->createWorkspace($data);
        $this->assertIsArray($workspace);
    }

    public function testUpdateWorkspace()
    {
        // Replace 'workspace_id' and $data with an actual workspace ID and data for testing
        $workspaceId = 'workspace_id';
        $data = [
            // Add updated workspace data here
        ];
        $workspace = $this->airbyte->updateWorkspace($workspaceId, $data);
        $this->assertIsArray($workspace);
    }

    public function testDeleteWorkspace()
    {
        // Replace 'workspace_id' with an actual workspace ID for testing
        $workspaceId = 'workspace_id';
        $response = $this->airbyte->deleteWorkspace($workspaceId);
        $this->assertIsArray($response);
    }

    public function testGetSources()
    {
        $sources = $this->airbyte->getSources();
        $this->assertIsArray($sources);
    }

    public function testGetSourceById()
    {
        // Replace 'source_id' with an actual source ID for testing
        $source = $this->airbyte->getSourceById('source_id');
        $this->assertIsArray($source);
    }

    public function testCreateSource()
    {
        // Replace $data with an array of source data for testing
        $data = [
            // Add source data here
        ];
        $source = $this->airbyte->createSource($data);
        $this->assertIsArray($source);
    }

    public function testUpdateSource()
    {
        // Replace 'source_id' and $data with an actual source ID and data for testing
        $sourceId = 'source_id';
        $data = [
            // Add updated source data here
        ];
        $source = $this->airbyte->updateSource($sourceId, $data);
        $this->assertIsArray($source);
    }

    public function testDeleteSource()
    {
        // Replace 'source_id' with an actual source ID for testing
        $sourceId = 'source_id';
        $response = $this->airbyte->deleteSource($sourceId);
        $this->assertIsArray($response);
    }

    public function testGetDestinations()
    {
        $destinations = $this->airbyte->getDestinations();
        $this->assertIsArray($destinations);
    }

    public function testGetDestinationById()
    {
        // Replace 'destination_id' with an actual destination ID for testing
        $destination = $this->airbyte->getDestinationById('destination_id');
        $this->assertIsArray($destination);
    }

    public function testCreateDestination()
    {
        // Replace $data with an array of destination data for testing
        $data = [
            // Add destination data here
        ];
        $destination = $this->airbyte->createDestination($data);
        $this->assertIsArray($destination);
    }

    public function testUpdateDestination()
    {
        // Replace 'destination_id' and $data with an actual destination ID and data for testing
        $destinationId = 'destination_id';
        $data = [
            // Add updated destination data here
        ];
        $destination = $this->airbyte->updateDestination($destinationId, $data);
        $this->assertIsArray($destination);
    }

    public function testDeleteDestination()
    {
        // Replace 'destination_id' with an actual destination ID for testing
        $destinationId = 'destination_id';
        $response = $this->airbyte->deleteDestination($destinationId);
        $this->assertIsArray($response);
    }
}
