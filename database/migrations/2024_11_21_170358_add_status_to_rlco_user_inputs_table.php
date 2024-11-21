<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRlcoUserInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rlco_user_inputs', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('validation_rules'); // Add status column
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
            $table->dropColumn('status'); // Remove status column if rolled back
        });
    }
}
