<?php

namespace Xolens\PgLarauser\Test\Repository;

use Xolens\PgLarauser\App\Repository\AccessRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarauser\Test\WritableTestPgLarauserBase;

final class AccessRepositoryTest extends WritableTestPgLarauserBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new AccessRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            'code' => 'code'.$i,
            'name' => 'name'.$i,
            'description' => 'description'.$i,
            'readable' => $i%2==0,
            'updatable' => $i%2==0,
            'deletable' => $i%2==0,
            'trashable' => $i%2==0,
            'restorable' => $i%2==0,
            'importable' => $i%2==0,
            'exportable' => $i%2==0,
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
                'code' => 'code'.$i,
                'name' => 'name'.$i,
                'description' => 'description'.$i,
                'readable' => $i%2==0,
                'updatable' => $i%2==0,
                'deletable' => $i%2==0,
                'trashable' => $i%2==0,
                'restorable' => $i%2==0,
                'importable' => $i%2==0,
                'exportable' => $i%2==0,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

