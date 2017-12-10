<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('solution_categories')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('image', 200);
            $table->text('desc');
            $table->string('attachment', 200);
            //$table->longtext('body');
            $table->integer('sort_id')->default(999);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('solution_has_items', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
            $table->integer('solution_id')->unsigned();
            $table->foreign('solution_id')
                ->references('id')
                ->on('solutions')
                ->onDelete('cascade');
            $table->primary(['item_id', 'solution_id']);
            $table->integer('sort_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
