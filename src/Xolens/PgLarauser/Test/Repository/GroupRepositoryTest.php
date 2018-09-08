<?php

namespace Xolens\PgLarauser\Test\Repository;

use PHPUnit\Framework\TestCase;
use Xolens\PgLarauser\App\Repository\GroupRepository;
use Xolens\PgLarauser\App\Repository\ProfileRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\TestPgLarauserBase;

final class GroupRepositoryTest extends TestPgLarauserBase
{
    protected $profileRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new GroupRepository();
        $this->profileRepo = new ProfileRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "name"=> "name".$i,
            "description"=> "description".$i,
            "profile_id"=> $i,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('name')
                ->asc('description');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('name','%tab%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $profileId = $this->profileRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                "profile_id"=> $profileId,
                "name"=> "name".$i,
                "description"=> "description".$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}