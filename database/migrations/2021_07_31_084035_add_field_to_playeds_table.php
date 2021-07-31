<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToPlayedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playeds', function (Blueprint $table) {
            $table->unsignedSmallInteger('artist_id')->nullable();
            $table->foreign('artist_id')->references('id')->on('artists');

            $table->unsignedSmallInteger('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albums');

            $table->unsignedSmallInteger('track_id')->nullable();
            $table->foreign('track_id')->references('id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playeds', function (Blueprint $table) {
            $table->dropColumn('artist_id');
            $table->dropColumn('album_id');
            $table->dropColumn('track_id');
        });
    }
}
