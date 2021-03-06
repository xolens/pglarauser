<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateProfilesTrigger extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'profiles_trigger';
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $triggerFunction = self::table()."_function";
        DB::unprepared("
            CREATE OR REPLACE FUNCTION ".$triggerFunction."() RETURNS trigger
            LANGUAGE plpgsql AS $$
                BEGIN
                    IF TG_OP = 'INSERT' THEN
                        INSERT INTO ".PgLarauserCreateTableProfileAccess::table()."(
                            can_read,
                            can_update,
                            can_delete,
                            can_trash,
                            can_restore,
                            can_import,
                            can_export,
                            access_id,
                            profile_id
                        )
                        SELECT false, false, false, false, false, false, false, id, NEW.id from ".PgLarauserCreateTableAccess::table().";
                    ELSEIF TG_OP = 'DELETE' THEN
                        DELETE FROM ".PgLarauserCreateTableProfileAccess::table()." WHERE profile_id = OLD.id; 
                        RETURN OLD;
                    END IF;
                    RETURN NEW;
                END;
            $$;
        
            CREATE TRIGGER ".self::table()." AFTER INSERT OR UPDATE OR DELETE ON ".PgLarauserCreateTableProfiles::table()." FOR EACH ROW
                EXECUTE PROCEDURE ".$triggerFunction."();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::unprepared("DROP TRIGGER ".self::table()." ON ".PgLarauserCreateTableProfiles::table().";");
    }
}
