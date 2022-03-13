<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("diary", function (Blueprint $table) {
            $table->id();
            $table
                ->integer("journal")
                ->nullable(false)
                ->reference("journal")
                ->on("journal");
            $table->timestamp("time_created")->nullable(false);
            $table->timestamp("time_updated")->nullable(false);
            $table->string("content")->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("diary");
    }
}
