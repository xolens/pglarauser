<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateTableAccess extends PgLarauserMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'access';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::table(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('base');
            $table->boolean('is_public')->default(false);
            $table->string('code')->unique();
            $table->boolean('readable')->default(false);
            $table->boolean('updatable')->default(false);
            $table->boolean('deletable')->default(false);
            $table->boolean('trashable')->default(false);
            $table->boolean('restorable')->default(false);
            $table->boolean('importable')->default(false);
            $table->boolean('exportable')->default(false);
        });
        if(self::logEnabled()){
            self::registerForLog();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(self::logEnabled()){
            self::unregisterFromLog();
        }
        Schema::dropIfExists(self::table());

    }
}
