<?php

namespace Xolens\PgLarauser\App\Repository\View;

use Xolens\PgLarauser\App\Model\View\PublicUserView;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class PublicUserViewRepository extends AbstractReadableRepository implements PublicUserViewRepositoryContract
{
    public function model(){
        return PublicUserView::class;
    }
}
