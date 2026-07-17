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

        Schema::table('mahasiswa', function (Blueprint $table) {
            if (!Schema::hasColumn('mahasiswa', 'angkatan')) {
                $table->string('angkatan', 255)->nullable();
            }
            if (!Schema::hasColumn('mahasiswa', 'periode')) {
                $table->string('periode', 255)->nullable();
            }
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

        Schema::table('mahasiswa', function (Blueprint $table) {
            if (Schema::hasColumn('mahasiswa', 'periode')) {
                $table->dropColumn('periode');
            }
            if (Schema::hasColumn('mahasiswa', 'angkatan')) {
                $table->dropColumn('angkatan');
            }
        });
    }
};
