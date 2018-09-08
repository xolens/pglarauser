<?php

namespace Xolens\PgLarauser\Test;

use \Orchestra\Testbench\TestCase;
use Xolens\PgLarautil\Test\RepositoryTrait\WritableRepositoryTestTrait;
use Xolens\PgLarautil\Test\RepositoryTrait\ReadableRepositoryTestTrait;

abstract class TestPgLarauserBase extends TestCase
{
    use ReadableRepositoryTestTrait, WritableRepositoryTestTrait;
    
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

    public function generateSingleItem(){
        return $this->generateItems(1)[0];
    }

    abstract public function generateItems($toGenerateCount);
}