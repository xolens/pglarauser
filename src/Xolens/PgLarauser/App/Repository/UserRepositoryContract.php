<?php

namespace Xolens\PgLarauser\App\Repository;

use Illuminate\Http\Request;
use Xolens\PgLarautil\App\Repository\WritableRepositoryContract;

interface UserRepositoryContract extends WritableRepositoryContract
{
    // public function paginateByGroup($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');
}
