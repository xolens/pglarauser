<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateViewProfileAccess extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'profile_access_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLarauserCreateTableProfileAccess::table();
        $accessTable = PgLarauserCreateTableAccess::table();
        $profileTable = PgLarauserCreateTableProfiles::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$accessTable.".code as access_code,
                    ".$accessTable.".name as access_name,
                    ".$accessTable.".readable as access_readable,
                    ".$accessTable.".updatable as access_updatable,
                    ".$accessTable.".deletable as access_deletable,
                    ".$accessTable.".trashable as access_trashable,
                    ".$accessTable.".restorable as access_restorable,
                    ".$accessTable.".importable as access_importable,
                    ".$accessTable.".exportable as access_exportable,
                    ".$profileTable.".name as profile_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$accessTable." ON ".$accessTable.".id = ".$mainTable.".access_id
                    LEFT JOIN ".$profileTable." ON ".$profileTable.".id = ".$mainTable.".profile_id
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS ".self::table());
    }
}

