<?php

namespace Xolens\PgLarauser\App\Util;

use Illuminate\Support\Facades\DB;

abstract class PgLarauserMigration extends AbstractPgLarauserMigration
{
    public static function tablePrefix(){
        return config('xolens-pglarauser.pglarauser-database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('xolens-pglarauser.pglarauser-database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('xolens-pglarauser.pglarauser-enable_database_log');
    }
}
