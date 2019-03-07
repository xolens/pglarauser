<?php

namespace Xolens\PgLarauser\Test\Repository;

use Xolens\PgLarauser\App\Repository\LoginHistoryRepository;
use Xolens\PgLarauser\App\Repository\UserRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\WritableTestPgLarauserBase;
use Carbon\Carbon;

final class LoginHistoryRepositoryTest extends WritableTestPgLarauserBase
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
        $userId = $this->userRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'client_ip' => 'clientIp'.$i,
            'connexion_at' => Carbon::now()->toDateTimeString(),
            'http_user_agent' => 'httpUserAgent'.$i,
            'type' => 'type'.$i,
            'user_id' => $userId,
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
            $userId = $this->userRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'client_ip' => 'clientIp'.$i,
                'connexion_at' => Carbon::now()->toDateTimeString(),
                'http_user_agent' => 'httpUserAgent'.$i,
                'type' => 'type'.$i,
                'user_id' => $userId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

