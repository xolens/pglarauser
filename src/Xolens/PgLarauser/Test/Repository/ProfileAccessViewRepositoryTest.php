<?php

namespace Xolens\PgLarauser\Test\Repository;

use PHPUnit\Framework\TestCase;
use Xolens\PgLarauser\App\Repository\ProfileAccessViewRepository;

use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\ReadOnlyTestPgLarauserBase;

final class ProfileAccessViewRepositoryTest extends ReadOnlyTestPgLarauserBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ProfileAccessViewRepository();
        $this->repo = $repo;
    }

    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('profile_id')
                ->asc('access_id');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->greater('profile_id',0);
        return $filterer;
    }
}