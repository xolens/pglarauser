<?php

namespace Xolens\PgLarauser\Test;

use \Orchestra\Testbench\TestCase;
use Xolens\PgLarautil\Test\RepositoryTrait\Xolens\PgLarautil\Test\RepositoryTrait;
use Xolens\PgLarautil\Test\RepositoryTrait\ReadOnlyRepositoryTestTrait;

abstract class ReadOnlyTestPgLarauserBase extends TestCase
{
    use ReadOnlyRepositoryTestTrait;
    
    protected $repo;

    public function repository(){
        return $this->repo;
    }

    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarautil\PgLarautilServiceProvider',
            'Xolens\PgLarauser\PgLarauserServiceProvider'
        ];
    }
}