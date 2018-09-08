<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateProfilesAccessView extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'profiles_access_view';
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $profilesAccessTable = PgLarauserCreateProfilesAccessTable::table();
        $accessTable = PgLarauserCreateAccessTable::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS
            (
                SELECT 
                    ".$accessTable.".code,
                    ".$accessTable.".description,
                    ".$profilesAccessTable.".id,
                    ".$profilesAccessTable.".access_id,
                    ".$profilesAccessTable.".profile_id,
                    ".$profilesAccessTable.".can_read,
                    ".$profilesAccessTable.".can_update,
                    ".$profilesAccessTable.".can_delete,
                    ".$profilesAccessTable.".can_trash,
                    ".$profilesAccessTable.".can_restore,
                    ".$profilesAccessTable.".can_import,
                    ".$profilesAccessTable.".can_export,
                    ".$profilesAccessTable.".created_at,
                    ".$profilesAccessTable.".updated_at
                from
                    ".$profilesAccessTable." 
                LEFT JOIN
                    ".$accessTable."
                ON ".$profilesAccessTable.".access_id = ".$accessTable.".id
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
