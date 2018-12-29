<?php

namespace Xolens\PgLarauser\App\Repository\View;

use Xolens\PgLarauser\App\Model\Profile;
use Xolens\PgLarauser\App\Model\View\ProfileView;
use Xolens\LarauserContract\App\Contract\Repository\View\ProfileViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\LarautilContract\App\Util\Model\Sorter;

class ProfileViewRepository extends AbstractReadableRepository implements ProfileViewRepositoryContract
{
    public function model(){
        return ProfileView::class;
    }
}
