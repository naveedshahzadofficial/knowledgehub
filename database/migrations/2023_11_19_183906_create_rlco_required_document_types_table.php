<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRlcoRequiredDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rlco_required_document_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rlco_id')->constrained();
			$table->foreignId('rlco_required_document_id')->constrained();
			$table->string('document_type')->nullable();
			$table->text('remark')->nullable();
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
        Schema::dropIfExists('rlco_required_document_types');
    }
}
