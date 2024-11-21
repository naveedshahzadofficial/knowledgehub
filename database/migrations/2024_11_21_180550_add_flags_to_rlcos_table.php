<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagsToRlcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlcos', function (Blueprint $table) {
            $table->tinyInteger('construction_flag')->default(false)->after('is_fee_required_time_of_application');
            $table->boolean('common_flag')->default(false)->after('construction_flag');
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
            $table->dropColumn('construction_flag');
            $table->dropColumn('common_flag');
        });
    }
}
