<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateUpdateProfileAccessFunction extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'update_profile_access_function';
    }
    

    public static function arrayKeyValueEquals($array, $key, $value, $default=false){
        if(array_key_exists($key, $array)){
            return $array[$key] == $value;
        }
        return $default;
    }
    public static function invoque($profileId, $accessCodeRegex, array $access = []){
        $profileId = (int) $profileId;
        $canRead = self::arrayKeyValueEquals($access, 'canRead', true);
        $canUpdate = self::arrayKeyValueEquals($access, 'canUpdate', true);
        $canDelete = self::arrayKeyValueEquals($access, 'canDelete', true);
        $canTrash = self::arrayKeyValueEquals($access, 'canTrash', true);
        $canRestore = self::arrayKeyValueEquals($access, 'canRestore', true);
        $canImport = self::arrayKeyValueEquals($access, 'canImport', true);
        $canExport = self::arrayKeyValueEquals($access, 'canExport', true);
        return DB::select("SELECT ".self::table()."(?, ?, ?, ?, ?, ?, ?, ?, ?) AS result", [
            $profileId,
            $accessCodeRegex,
            $canRead,
            $canUpdate,
            $canDelete,
            $canTrash,
            $canRestore,
            $canImport,
            $canExport,
        ])[0]->result;
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
            CREATE OR REPLACE FUNCTION ".self::table()."(
                __profile_id integer,
                __access_code_regex text,
                __can_read bool,
                __can_update bool,
                __can_delete bool,
                __can_trash bool,
                __can_restore bool,
                __can_import bool,
                __can_export bool
            ) RETURNS bool
            LANGUAGE plpgsql AS $$
                DECLARE
                    temprow record;
                BEGIN

                    FOR temprow IN
                        SELECT * FROM ".PgLarauserCreateTableAccess::table()." WHERE code like $2
                    LOOP
                        UPDATE ".PgLarauserCreateTableProfileAccess::table()." SET 
                            can_read= $3 AND temprow.readable,
                            can_update= $4 AND temprow.updatable,
                            can_delete= $5 AND temprow.deletable,
                            can_trash= $6 AND temprow.trashable,
                            can_restore= $7 AND temprow.restorable,
                            can_import= $8 AND temprow.importable,
                            can_export= $9 AND temprow.exportable,
                            updated_at= NOW()
                        WHERE profile_id = $1 AND access_id = temprow.id;                   
                    END LOOP;
                
                    RETURN true;
                END;
            $$;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::unprepared("DROP FUNCTION ".self::table().";");
    }
}
