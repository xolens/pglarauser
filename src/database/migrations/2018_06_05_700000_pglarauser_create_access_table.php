<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateAccessTable extends PgLarauserMigration
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
            $table->string('code')->unique();
            $table->string('description')->nullable();
            $table->string('readable')->default(false);
            $table->string('updatable')->default(false);
            $table->string('deletable')->default(false);
            $table->string('trashable')->default(false);
            $table->string('restorable')->default(false);
            $table->string('importable')->default(false);
            $table->string('exportable')->default(false);
            $table->timestamps();       
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
