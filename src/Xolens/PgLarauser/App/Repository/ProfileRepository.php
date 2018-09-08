<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Profile;
use Xolens\LarauserContract\App\Repository\Contract\ProfileRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class ProfileRepository extends AbstractWritableRepository implements ProfileRepositoryContract
{
    public function model(){
        return Profile::class;
    }
    
}