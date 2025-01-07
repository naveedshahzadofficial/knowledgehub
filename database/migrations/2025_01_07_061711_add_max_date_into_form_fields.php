<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxDateIntoFormFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_fields', function (Blueprint $table) {
            $table->tinyInteger('date_type')->default(1)->comment('1 = Date Only, 2 = Year Only, 3 = Time Only, 3 = Date Time');
            $table->tinyInteger('max_date')->default(1)->comment('1 = Future Date, 2 = Current Date, 3 = Specific Date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_fields', function (Blueprint $table) {
           $table->dropColumn('date_type', 'max_date');
        });
    }
}
