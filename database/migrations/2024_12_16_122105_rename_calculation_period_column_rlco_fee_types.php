<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCalculationPeriodColumnRlcoFeeTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_fee_types', function (Blueprint $table) {
            $table->dropColumn('calculation_period');
            $table->tinyInteger('applicable_to')->default(1)->comment('1 = First Fee, 2 = Further Fee, 3 = Both Fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rlco_fee_types', function (Blueprint $table) {
            $table->dropColumn('applicable_to');
            $table->string('calculation_period')->nullable();
        });
    }
}
