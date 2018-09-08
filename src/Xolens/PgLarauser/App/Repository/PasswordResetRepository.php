<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\PasswordReset;
use Xolens\LarauserContract\App\Repository\Contract\PasswordResetRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class PasswordResetRepository extends AbstractWritableRepository implements PasswordResetRepositoryContract
{
    public function model(){
        return PasswordReset::class;
    }

    public function paginateByUser($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(LoginHistory::USER_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
}