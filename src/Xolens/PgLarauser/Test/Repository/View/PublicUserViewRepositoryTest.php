<?php

namespace Xolens\PgLarauser\Test\Repository\View;

use Xolens\PgLarauser\App\Repository\View\PublicUserViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\ReadOnlyTestPgLarauserBase;

final class PublicUserViewRepositoryTest extends ReadOnlyTestPgLarauserBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new PublicUserViewRepository();
        $this->repo = $repo;
    }

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('id');
                //->asc('name');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14]);
                //->like('name','%tab%');
        return $filterer;
    }
}

