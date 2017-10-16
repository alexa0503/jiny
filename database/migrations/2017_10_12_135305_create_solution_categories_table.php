<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('thumb',200);
            $table->string('image',200);
            $table->text('desc');
            $table->integer('sort_id')->default(999);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solution_categories');
    }
}
