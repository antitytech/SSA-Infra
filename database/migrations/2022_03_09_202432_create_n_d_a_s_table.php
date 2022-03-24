<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_d_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('inves_user_id')->nullable();
            $table->string('nda_dev')->nullable();
            $table->string('nda_inves')->nullable();
            $table->string('nda_user_status')->default(2);
            $table->string('nda_dev_status')->default(2);
            $table->string('nda_inves_status')->default(2);
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
        Schema::dropIfExists('n_d_a_s');
    }
};
