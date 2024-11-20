<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRlcoVariableFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rlco_variable_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('unit')->nullable();
            $table->decimal('unit_quantity', 11,2)->nullable();
            $table->decimal('price',11,2)->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->unsignedInteger('order')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rlco_variable_fees');
    }
}
