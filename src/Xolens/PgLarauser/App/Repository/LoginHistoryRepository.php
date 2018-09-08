<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\LoginHistory;
use Xolens\LarauserContract\App\Repository\Contract\LoginHistoryRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class LoginHistoryRepository extends AbstractWritableRepository implements LoginHistoryRepositoryContract
{
    public function model(){
        return LoginHistory::class;
    }
    
    public function paginateByUser($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(LoginHistory::USER_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
}