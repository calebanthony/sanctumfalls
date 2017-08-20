<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_skill')->nullable()->unsigned();
            $table->foreign('parent_skill')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('left_or_right');
            $table->timestamps();
        });

        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('health');
            $table->integer('armor');
            $table->integer('talent1')->unsigned();
            $table->foreign('talent1')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('talent2')->unsigned();
            $table->foreign('talent2')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('talent3')->unsigned();
            $table->foreign('talent3')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('lmb_ability')->unsigned();
            $table->foreign('lmb_ability')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('rmb_ability')->unsigned();
            $table->foreign('rmb_ability')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('q_ability')->unsigned();
            $table->foreign('q_ability')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('e_ability')->unsigned();
            $table->foreign('e_ability')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
            $table->integer('f_ability')->unsigned();
            $table->foreign('f_ability')
                ->references('id')
                ->on('skills')
                ->onDelete('set null');
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
        Schema::dropIfExists('heroes');
        Schema::dropIfExists('skills');
    }
}
