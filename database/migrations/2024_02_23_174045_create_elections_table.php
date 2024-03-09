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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('electionTitle')->nullable();
            $table->string('schoolYear')->nullable();
            $table->string('department')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->boolean('isArchived')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('personnel_id')->nullable();
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
