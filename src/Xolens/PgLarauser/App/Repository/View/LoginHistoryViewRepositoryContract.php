<?php

namespace Xolens\PgLarauser\App\Repository\View;

use Xolens\PgLarautil\App\Repository\ReadableRepositoryContract;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

interface LoginHistoryViewRepositoryContract extends ReadableRepositoryContract
{

     public function paginateByUser($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByUserSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByUserFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

     public function paginateByUserSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page');

}
