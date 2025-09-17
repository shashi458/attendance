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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
              // Basic Info
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed']);

            // ID & Contact
            $table->string('aadhaar_number', 12)->nullable();
            $table->string('mobile', 10);
            $table->string('email')->unique();
            $table->text('address');

            // Job Info
            $table->string('designation');
            $table->date('date_of_joining');

            // Uploads (file paths)
            $table->string('profile_photo')->nullable();
            $table->string('id_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
