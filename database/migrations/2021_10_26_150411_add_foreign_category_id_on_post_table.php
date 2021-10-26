<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // definizione colonna
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            // definizione foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //eliminazione il vincolo (la foreign key)
            $table->dropForeign('posts_category_id_foreign');

            //eliminazione colonna
            $table->dropColumn('category_id');
        });
    }
}
