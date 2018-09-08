<?php

namespace Xolens\PgLarauser\Test\Repository;

use PHPUnit\Framework\TestCase;
use Xolens\PgLarauser\App\Repository\LoginHistoryRepository;
use Xolens\PgLarauser\App\Repository\UserRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\TestPgLarauserBase;

final class LoginHistoryRepositoryTest extends TestPgLarauserBase
{
    protected $userRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new LoginHistoryRepository();
        $this->userRepo = new UserRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            "client_ip"=> "client_ip".$i,
            "http_user_agent"=> "http_user_agent".$i,
            "user_id"=> $i,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('client_ip')
                ->asc('http_user_agent');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14])
                ->like('client_ip','%tab%');
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $userId = $this->userRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                "user_id"=> $userId,
                "client_ip"=> "client_ip".$i,
                "http_user_agent"=> "http_user_agent".$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}