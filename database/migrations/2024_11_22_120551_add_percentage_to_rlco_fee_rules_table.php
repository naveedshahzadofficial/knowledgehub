<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPercentageToRlcoFeeRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_fee_rules', function (Blueprint $table) {
            $table->decimal('percentage', 5, 2)->nullable()->after('rate'); // Allows percentages up to 999.99
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
            $table->dropColumn('percentage');
        });
    }
}
