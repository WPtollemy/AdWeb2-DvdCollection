<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerToDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dvds', function (Blueprint $table) {
            $table->unsignedInteger('ownerId');
            $table->foreign('ownerId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dvds', function (Blueprint $table) {
            $table->dropForeign('dvds_ownerId_foreign');
            $table->dropColumn('ownerId');
        });
    }
}
