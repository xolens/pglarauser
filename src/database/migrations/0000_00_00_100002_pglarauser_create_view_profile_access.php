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
                    ".$mainTable.".id,
                    ".$mainTable.".profile_id,
                    ".$mainTable.".access_id,

                    (".$accessTable.".readable AND ".$mainTable.".can_read) as can_read,
                    (".$accessTable.".updatable AND ".$mainTable.".can_update) as can_update,
                    (".$accessTable.".deletable AND ".$mainTable.".can_delete) as can_delete,
                    (".$accessTable.".trashable AND ".$mainTable.".can_trash) as can_trash,
                    (".$accessTable.".restorable AND ".$mainTable.".can_restore) as can_restore,
                    (".$accessTable.".importable AND ".$mainTable.".can_import) as can_import,
                    (".$accessTable.".exportable AND ".$mainTable.".can_export) as can_export,
                    
                    can_read OR can_update OR can_trash OR can_import OR can_export as can_access,
                    ".$accessTable.".code as access_code,
                    ".$accessTable.".base as access_base,
                    ".$accessTable.".is_public as access_is_public,

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

