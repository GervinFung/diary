<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table
                ->string("email")
                ->nullable(false)
                ->unique();
            $table->timestamp("email_verified_at")->nullable(true);
            $table->string("password")->nullable(false);
            $table->rememberToken();
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
        Schema::dropIfExists("user");
    }
}
