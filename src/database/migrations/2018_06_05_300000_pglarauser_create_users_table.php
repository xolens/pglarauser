<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Xolens\PgLarauser\App\Util\PgLarauserMigration;

class PgLarauserCreateUsersTable extends PgLarauserMigration
{
    public const ACCOUNT_STATES = ['PENDING','VALID','INVALID', 'RECOVERING'];
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'users';
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('state',self::ACCOUNT_STATES);
            $table->integer('group_id')->index();
            $table->rememberToken();
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
