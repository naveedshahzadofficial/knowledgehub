<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIntoRlcoUserInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_user_inputs', function (Blueprint $table) {
            $table->decimal('minimum_value', 20, 2)->nullable();
            $table->decimal('maximum_value', 20, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rlco_user_inputs', function (Blueprint $table) {
            $table->dropColumn('maximum_value', 'minimum_value');
        });
    }
}
