<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderAndStatusToRlcoFeeRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_fee_rules', function (Blueprint $table) {
            // Add 'order' and 'status' columns to the 'rlco_fee_rules' table
            $table->integer('order')->default(0)->after('unit'); // Add the 'order' column after the 'name' column
            $table->boolean('status')->default(true)->after('order'); // Add the 'status' column after the 'order' column
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
            // Drop the 'order' and 'status' columns if we roll back the migration
            $table->dropColumn('order');
            $table->dropColumn('status');
        });
    }
}
