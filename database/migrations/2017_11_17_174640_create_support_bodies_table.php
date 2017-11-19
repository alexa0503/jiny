<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_bodies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('image',200);
            $table->binary('txt');
            $table->unsignedInteger('support_id')->nullable();
            $table->foreign('support_id')->references('id')->on('supports')->onDelete('cascade');
            $table->integer('sort_id')->default(999);
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
        Schema::dropIfExists('support_bodies');
    }
}
