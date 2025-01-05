<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProcessingFeeIntoRlcoFeeRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_fee_rules', function (Blueprint $table) {
            $table->decimal('processing_fee', 20, 0)->nullable()->after('fixed_fee');
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
           $table->dropColumn('processing_fee');
        });
    }
}
