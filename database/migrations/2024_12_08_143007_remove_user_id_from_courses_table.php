<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the column
            $table->dropForeign(['user_id']); // This drops the foreign key constraint on the 'user_id' column
            $table->dropColumn('user_id'); // Now safely drop the 'user_id' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            // If rolling back, add the 'user_id' column and re-add the foreign key constraint
            $table->unsignedBigInteger('user_id'); // Re-add the 'user_id' column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Re-add the foreign key constraint
        });
    }
};
