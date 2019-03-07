<?php

namespace Xolens\PgLarauser\App\Repository\View;

use Xolens\PgLarauser\App\Model\PasswordReset;
use Xolens\PgLarauser\App\Model\View\PasswordResetView;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class PasswordResetViewRepository extends AbstractReadableRepository implements PasswordResetViewRepositoryContract
{
    public function model(){
        return PasswordResetView::class;
    }
}
