<?php

namespace Xolens\PgLarauser\App\Repository;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Xolens\PgLarauser\App\Model\User;
use Xolens\LarauserContract\App\Contract\Repository\UserRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;

class UserRepository extends AbstractWritableRepository implements UserRepositoryContract
{
    public function model(){
        return User::class;
    }

    public function paginateByGroup($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(User::GROUP_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
    }
}