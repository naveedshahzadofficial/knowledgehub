<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRlcoVariableFees extends Migration
{
    public function up()
    {
        // Creating rlco_fee_types table
        Schema::create('rlco_fee_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_id')->constrained('rlcos')->onDelete('cascade'); // Foreign key to rlcos table
            $table->string('name'); // Name of the RLCO fee (e.g., Streamer Permission)
            $table->text('description')->nullable(); // Description of the fee
            $table->string('calculation_period')->nullable(); // Calculation period (per_week, per_poll)
            $table->timestamps();
        });

        // Creating rlco_fee_rules table
        Schema::create('rlco_fee_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_fee_type_id')->constrained('rlco_fee_types')->onDelete('cascade');
            $table->string('category'); // Category of the RLCO fee (e.g., Streamer Permission)
            $table->enum('calculation_type', ['rate_based', 'fixed_fee']); // Type of calculation
            $table->decimal('rate', 10, 2)->nullable(); // Rate per unit (e.g., Rs. 50 per stream)
            $table->decimal('minimum_fee', 10, 2)->nullable(); // Minimum fee (if applicable)
            $table->decimal('fixed_fee', 10, 2)->nullable(); // Fixed fee (if applicable)
            $table->string('unit'); // Unit of fee (streams_per_week, polls_per_week)
            $table->timestamps();
        });

        // Creating rlco_user_inputs table
        Schema::create('rlco_user_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_fee_rule_id')->constrained('rlco_fee_rules')->onDelete('cascade');
            $table->string('input_name'); // Input name (e.g., streams_per_week)
            $table->string('input_label'); // Input label (e.g., Number of Streams per Week)
            $table->enum('input_type', ['number', 'text', 'date', 'select']); // Input type
            $table->text('validation_rules'); // Validation rules (e.g., required,numeric,min:0)
            $table->boolean('status')->default(true); // Validation rules (e.g., required,numeric,min:0)
            $table->timestamps();
        });
    }

    public function down()
    {
        // Dropping the tables in reverse order to maintain integrity
        Schema::dropIfExists('rlco_user_inputs');
        Schema::dropIfExists('rlco_fee_rules');
        Schema::dropIfExists('rlco_fee_types');
    }
}
