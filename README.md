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

## Changelog
See CHANGELOG.md for a list of changes made to the package across different versions.

## License
The MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
