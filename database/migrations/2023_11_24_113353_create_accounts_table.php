<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_info_id')->nullable()->constrained();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('tehsil_id')->nullable()->constrained();
            $table->foreignId('bank_id')->nullable()->constrained();
            $table->string('branch')->nullable();
            $table->unsignedBigInteger('payment_service_id')->nullable();
            $table->string('account_title')->nullable();
            $table->string('account_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
