<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeletesToSuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('superheroes', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('superheroes', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

}
