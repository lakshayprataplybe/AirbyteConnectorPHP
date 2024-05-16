# Airbyte Connector Laravel Package

This Laravel package provides a convenient way to connect to Airbyte APIs from your Laravel applications. Airbyte is an open-source data integration platform that helps you replicate data from various sources to your data warehouse or destination of choice.

## Installation

You can install this package via Composer. Run the following command:

```bash
composer require lybe/airbyte-connector
```

The package will automatically register its service provider.

## Usage
To use the Airbyte Connector in your Laravel application, you can use the provided facade or directly instantiate the AirbyteConnector class.

Here's an example of how to use the facade:

```php
use Lybe\AirbyteConnector\Facades\AirbyteFacade;

// Fetch all workspaces
$workspaces = AirbyteFacade::getWorkspaces();
```

And here's an example of how to use the class directly:

```php
use Lybe\AirbyteConnector\AirbyteConnector;

$connector = new AirbyteConnector();
$workspaces = $connector->getWorkspaces();
```

## Configuration
You can configure your Airbyte credentials in the config/airbyte.php file. Make sure to set your Airbyte username and password in the configuration file before using the package.

## Testing
You can run the package's PHPUnit tests by running the following command:

```bash
vendor/bin/phpunit
```

## Changelog
See CHANGELOG.md for a list of changes made to the package across different versions.

## License
This package is open-source software licensed under the MIT license.

```kotlin
Feel free to customize this README with additional information about your package, such as detailed usage instructions, examples, and any other relevant details.




