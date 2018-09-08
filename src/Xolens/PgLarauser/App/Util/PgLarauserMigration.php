<?php

namespace Xolens\PgLarauser\App\Util;

use Illuminate\Database\Migrations\Migration;
use Xolens\PgLarautil\App\Util\AbstractPgLarautilMigration;

abstract class PgLarauserMigration extends AbstractPgLarautilMigration 
{
    public static function tablePrefix(){
        return config('xolens-config.pglarauser-database_table_prefix');
    }

    public static function logEnabled(){
        return config('xolens-config.pglarauser-enable_database_log');
    }
}
