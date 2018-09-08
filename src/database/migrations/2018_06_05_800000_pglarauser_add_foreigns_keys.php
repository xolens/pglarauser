<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PgLarauserAddForeignsKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(PgLarauserCreatePasswordResetsTable::table(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(PgLarauserCreateUsersTable::table())->onDelete('cascade');      
        });
        Schema::table(PgLarauserCreateLoginHistoryTable::table(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(PgLarauserCreateUsersTable::table())->onDelete('cascade');      
        });
        Schema::table(PgLarauserCreateUsersTable::table(), function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on(PgLarauserCreateGroupsTable::table())->onDelete('cascade');      
        });
        Schema::table(PgLarauserCreateGroupsTable::table(), function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on(PgLarauserCreateProfilesTable::table())->onDelete('cascade');      
        });
        Schema::table(PgLarauserCreateProfilesAccessTable::table(), function (Blueprint $table) {
            $table->foreign('profile_id')->references('id')->on(PgLarauserCreateProfilesTable::table())->onDelete('cascade');      
            $table->foreign('access_id')->references('id')->on(PgLarauserCreateAccessTable::table())->onDelete('cascade');      
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(PgLarauserCreatePasswordResetsTable::table(), function (Blueprint $table) {
            $table->dropForeign(['user']);      
        });
        Schema::table(PgLarauserCreateLoginHistoryTable::table(), function (Blueprint $table) {
            $table->dropForeign(['user']);      
        });
        Schema::table(PgLarauserCreateUsersTable::table(), function (Blueprint $table) {
            $table->dropForeign(['group']);      
        });
        Schema::table(PgLarauserCreateGroupsTable::table(), function (Blueprint $table) {
            $table->dropForeign(['profile']);      
        });
        Schema::table(PgLarauserCreateProfilesAccessTable::table(), function (Blueprint $table) {
            $table->dropForeign(['access']);      
            $table->dropForeign(['profile']);      
        });
    }
}
