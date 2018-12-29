<?php

namespace Xolens\PgLarauser\Test\Repository;

use Xolens\PgLarauser\App\Repository\ProfileAccessRepository;
use Xolens\PgLarauser\App\Repository\ProfileRepository;
use Xolens\PgLarauser\App\Repository\AccessRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\WritableTestPgLarauserBase;

final class ProfileAccessRepositoryTest extends WritableTestPgLarauserBase
{
    protected $profileRepo;
    protected $accessRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ProfileAccessRepository();
        $this->profileRepo = new ProfileRepository();
        $this->accessRepo = new AccessRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $profileId = $this->profileRepo->model()::inRandomOrder()->first()->id;
        $accessId = $this->accessRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'profile_id' => $profileId,
            'access_id' => $accessId,
            'can_read' => $i%2==0,
            'can_update' => $i%2==0,
            'can_delete' => $i%2==0,
            'can_trash' => $i%2==0,
            'can_restore' => $i%2==0,
            'can_import' => $i%2==0,
            'can_export' => $i%2==0,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('id');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14]);
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $profileId = $this->profileRepo->model()::inRandomOrder()->first()->id;
            $accessId = $this->accessRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'profile_id' => $profileId,
                'access_id' => $accessId,
                'can_read' => $i%2==0,
                'can_update' => $i%2==0,
                'can_delete' => $i%2==0,
                'can_trash' => $i%2==0,
                'can_restore' => $i%2==0,
                'can_import' => $i%2==0,
                'can_export' => $i%2==0,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

