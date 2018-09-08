<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Group;
use Xolens\LarauserContract\App\Repository\Contract\GroupRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class GroupRepository extends AbstractWritableRepository implements GroupRepositoryContract
{
    public function model(){
        return Group::class;
    }
    
    public function paginateByProfile($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Group::PROFILE_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
}