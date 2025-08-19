<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encoding_building_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_number', 100);
            $table->string('or_number', 100)->nullable();
            $table->string('building_permit_number', 100)->nullable();
            $table->date('date_issued')->nullable();
            $table->string('applicant_name', 255)->nullable();
            $table->string('location', 500)->nullable();
            $table->string('use_or_coc', 100)->nullable();
            $table->string('project_title', 255)->nullable();
            $table->string('area', 100)->nullable();
            $table->decimal('estimated_cost', 15, 2)->nullable();
            $table->decimal('building_permit_fee', 15, 2)->nullable();
            $table->unsignedBigInteger('created_by')->default(0);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes(); // creates "deleted_at" as datetime2
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps(); // creates created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encoding_building_permit');
    }
};
