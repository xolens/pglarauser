<?php

namespace Xolens\PgLarauser\Test\Repository;

use Xolens\PgLarauser\App\Repository\PasswordResetRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\WritableTestPgLarauserBase;
use Carbon\Carbon;

final class PasswordResetRepositoryTest extends WritableTestPgLarauserBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new PasswordResetRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            'email' => 'email'.$i,
            'secret' => 'secret'.$i,
            'expire_at' => Carbon::now()->toDateTimeString(),
            'success' => 'success'.$i,
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
            $item = $this->repository()->create([
                'email' => 'email'.$i,
                'secret' => 'secret'.$i,
                'expire_at' => Carbon::now()->toDateTimeString(),
                'success' => $i%2==0,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

