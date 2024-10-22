<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRlcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_rlco', function (Blueprint $table) {
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->foreignId('rlco_id')->constrained()->onDelete('cascade');
            $table->primary(['form_id', 'rlco_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_rlco');
    }
}
