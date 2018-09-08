<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\ProfileAccess;
use Xolens\LarauserContract\App\Repository\Contract\ProfileAccessRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;

class ProfileAccessRepository extends AbstractWritableRepository implements ProfileAccessRepositoryContract
{
    public function model(){
        return ProfileAccess::class;
    }
    
    public function paginateByProfile($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(ProfileAccess::PROFILE_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }

    public function getByProfile($parentId, $columns = ['*']){
        $model = $this->model();
        $response = $model::where(ProfileAccessView::PROFILE_PROPERTY ,$parentId)->select($columns)->get();
        return $this->returnResponse();
    }
}