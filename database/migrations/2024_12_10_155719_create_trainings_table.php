<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Training title
            $table->text('description'); // Detailed description
            $table->string('trainer'); // Trainer name or ID
            $table->decimal('fees', 8, 2); // Fees for the training
            $table->string('duration'); // Duration, e.g., "4 weeks", "2 days"
            $table->date('start_date'); // Start date of the training
            $table->date('end_date'); // End date of the training
            $table->enum('mode', ['online', 'offline', 'hybrid']); // Mode of training
            $table->string('location')->nullable(); // Location for offline or hybrid mode
            $table->integer('max_participants')->default(0); // Maximum number of participants
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
}
