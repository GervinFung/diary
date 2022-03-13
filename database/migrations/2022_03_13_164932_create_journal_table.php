<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("journal", function (Blueprint $table) {
            $table
                ->integer("user")
                ->nullable(false)
                ->reference("user")
                ->on("user");
            $table->integer("year")->nullable(false);
            $table->string("title")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("journal");
    }
}
