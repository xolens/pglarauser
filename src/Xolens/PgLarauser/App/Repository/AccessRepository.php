<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Access;
use Xolens\LarauserContract\App\Repository\Contract\AccessRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class AccessRepository extends AbstractWritableRepository implements AccessRepositoryContract
{
    public function model(){
        return Access::class;
    }
    
}