<?php

namespace Xolens\PgLarauser\Test\Repository;

use Xolens\PgLarauser\App\Repository\UserRepository;
use Xolens\PgLarauser\App\Repository\GroupRepository;
use Xolens\PgLarauser\App\Model\User;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\TestPgLarauserBase;

final class UserRepositoryTest extends TestPgLarauserBase
{
    protected $groupeRepo;
   /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new UserRepository();
        $this->groupeRepo = new GroupRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $stateArray = User::ACCOUNT_STATES;
        $stateId = rand(0, count($stateArray)-1);
        $state = $stateArray[$stateId];
        $groupId = $this->groupeRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            "name"=> "name".$i,
            "email"=> "email".$i,
            "password"=> "password".$i,
            "state"=> $state,
            "group_id"=> $groupId,
        ]);
        $this->assertTrue(true);
        return $item;
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('name')
                ->asc('email');
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

            $stateArray = User::ACCOUNT_STATES;
            $stateId = rand(0, count($stateArray)-1);
            $state = $stateArray[$stateId];
            $groupId = $this->groupeRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                "name"=> "name".$i,
                "email"=> "email".$i,
                "password"=> "password".$i,
                "state"=> $state,
                "group_id"=> $groupId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}