<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('pin_id');
            $table->string('pin_title', 255);
            $table->text('pin_desc');
            $table->string('poster_name', 100)
                ->nullable()
                ->default('');
            $table->string('longitude', 100);
            $table->string('latitude', 100);
            $table->string('data_source', 50)
                ->nullable()
                ->default('');
            $table->timestamps();

            $table->index('data_source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pins');
    }
}
