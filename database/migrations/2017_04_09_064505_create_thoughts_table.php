<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thoughts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('thought_id');
            $table->integer('pin_id');
            $table->string('poster_name', 100)
                ->nullable()
                ->default('');
            $table->text('thought_text');
            $table->timestamps();

            $table->index('pin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thoughts');
    }
}
