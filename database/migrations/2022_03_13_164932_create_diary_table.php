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
        Schema::dropIfExists("diary");
        Schema::create("diary", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("journal_id")
                ->constrained("journal")
                ->nullable(false)
                ->onDelete("cascade");
            $table->date('date')->nullable(false);
            $table->text("content")->nullable(true);
            $table->timestamp("created_at")->useCurrent();
            $table
                ->timestamp("updated_at")
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
        Schema::dropIfExists("diary");
    }
}
