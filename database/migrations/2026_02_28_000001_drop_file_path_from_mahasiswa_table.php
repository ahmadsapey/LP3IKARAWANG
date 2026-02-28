<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('mahasiswa')) {
            return;
        }

        if (!Schema::hasColumn('mahasiswa', 'file_path')) {
            return;
        }

        // Preserve existing profile photo values before dropping the column
        if (Schema::hasColumn('mahasiswa', 'foto')) {
            DB::table('mahasiswa')
                ->whereNull('foto')
                ->whereNotNull('file_path')
                ->update(['foto' => DB::raw('file_path')]);
        }

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('mahasiswa')) {
            return;
        }

        if (Schema::hasColumn('mahasiswa', 'file_path')) {
            return;
        }

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('file_path', 255)->nullable()->after('asal_sekolah');
        });
    }
};
