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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_card');
            $table->date('birth_date');
            $table->text('address');
            $table->string('province');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('email');
            $table->string('education_level');
            $table->string('school_name');
            $table->decimal('gpa', 3, 2);
            $table->integer('graduation_year');
            $table->string('faculty');
            $table->string('program');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};