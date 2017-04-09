<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameThoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thoughts', function(Blueprint $table)
        {
            $table->renameColumn('thought_id', 'thot_id');
            $table->renameColumn('thought_text', 'thot_text');
        });
        Schema::rename('thoughts', 'thots');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
