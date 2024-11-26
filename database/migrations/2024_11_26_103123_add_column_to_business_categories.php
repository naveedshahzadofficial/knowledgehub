<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBusinessCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_categories', function (Blueprint $table) {
            $table->string('category_short_name')->nullable()->after('category_code');
            $table->string('category_icon')->nullable()->after('category_short_name');
            $table->boolean('category_is_sector')->default(false)->after('category_icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_categories', function (Blueprint $table) {
            $table->dropColumn('category_short_name');
            $table->dropColumn('category_icon');
            $table->dropColumn('category_is_sector');
        });
    }
}
