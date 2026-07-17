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
        if (!Schema::hasTable('mahasiswa')) {
            return;
        }

        if (Schema::hasColumn('mahasiswa', 'domisili')) {
            return;
        }

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('domisili', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('mahasiswa')) {
            return;
        }

        if (!Schema::hasColumn('mahasiswa', 'domisili')) {
            return;
        }

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn('domisili');
        });
    }
};
