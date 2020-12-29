<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategorryIdPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->integer('categorry_id')->unsigned()->nullable();
            $table->foreign('categorry_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('alias_of')->unsigned()->nullable();
            $table->foreign('alias_of')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign('pages_alias_of_foreign');
            $table->dropForeign('pages_categorry_id_foreign');
        });
    }
}
