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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->foreignId('proyek_id')->constrained('proyeks');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['To Do', 'In Progress', 'Done'])->default('To Do');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
