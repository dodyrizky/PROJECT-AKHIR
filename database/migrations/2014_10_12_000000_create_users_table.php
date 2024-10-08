<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });

        // Insert data langsung ke tabel
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'role' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$12$FR2zmo3PCqgfLOiSsFcWsORu2N7FgIqbuTOGnZKxCP.whQIw1ry5K',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
