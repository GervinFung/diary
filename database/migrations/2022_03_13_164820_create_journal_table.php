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
        Schema::dropIfExists('journal');
        Schema::create('journal', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('user_id')
                ->constrained('user')
                ->nullable(false)
                ->onDelete('cascade');
            $table->integer('year')->nullable(false);
            $table->string('title')->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table
                ->timestamp('updated_at')
                ->nullable(true)
                ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal');
    }
}
