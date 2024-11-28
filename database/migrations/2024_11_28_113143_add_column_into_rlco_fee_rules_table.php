<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIntoRlcoFeeRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_fee_rules', function (Blueprint $table) {
            $table->decimal('maximum_fee', 20, 2)->nullable(); // Minimum fee (if applicable)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rlco_fee_rules', function (Blueprint $table) {
            $table->dropColumn('maximum_fee');
        });
    }
}
