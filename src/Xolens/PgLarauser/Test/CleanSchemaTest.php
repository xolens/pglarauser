<?php

namespace Xolens\PgLarauser\Test;

use DB;
use Xolens\PgLarautil\Test\CleanSchemaBase;

final class CleanSchemaTest extends CleanSchemaBase
{
    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLarasetting\PgLarasettingServiceProvider',
            'Xolens\PgLarauser\PgLarauserServiceProvider'
        ];
    }
}