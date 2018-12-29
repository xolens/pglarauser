<?php

namespace Xolens\PgLarauser\App\Repository\View;

use Xolens\PgLarauser\App\Model\Access;
use Xolens\PgLarauser\App\Model\View\AccessView;
use Xolens\LarauserContract\App\Contract\Repository\View\AccessViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\LarautilContract\App\Util\Model\Sorter;

class AccessViewRepository extends AbstractReadableRepository implements AccessViewRepositoryContract
{
    public function model(){
        return AccessView::class;
    }
}
