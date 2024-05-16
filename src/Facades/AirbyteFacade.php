<?php

namespace Lybe\AirbyteConnector\Facades;

use Illuminate\Support\Facades\Facade;

class AirbyteFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'airbyte';
    }
}
