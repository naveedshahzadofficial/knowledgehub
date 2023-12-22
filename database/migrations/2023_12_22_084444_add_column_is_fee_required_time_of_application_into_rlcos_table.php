<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsFeeRequiredTimeOfApplicationIntoRlcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlcos', function (Blueprint $table) {
           $table->string('is_fee_required_time_of_application')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rlcos', function (Blueprint $table) {
           $table->dropColumn('is_fee_required_time_of_application');
        });
    }
}
