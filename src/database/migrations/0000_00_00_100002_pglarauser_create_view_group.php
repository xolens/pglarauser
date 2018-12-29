<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateViewGroup extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'group_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLarauserCreateTableGroups::table();
        $profileTable = PgLarauserCreateTableProfiles::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$profileTable.".name as profile_name
                FROM ".$mainTable." 
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

