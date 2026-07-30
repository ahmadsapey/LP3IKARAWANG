<?php

namespace Tests\Unit;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\Test;

class MahasiswaNipdTest extends \Tests\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('nipd.branch_code', '260781');
        config()->set('nipd.program_codes', [
            'AIS' => '003',
            'ASE' => '004',
            'OAA' => '007',
        ]);
        config()->set('nipd.sequence_digits', 4);

        if (!Schema::hasTable('mahasiswa')) {
            Schema::create('mahasiswa', function ($table) {
                $table->id('id_mahasiswa');
                $table->string('nipd')->nullable();
                $table->string('id_program_studi')->nullable();
                $table->string('id_program_study')->nullable();
                $table->string('status_verifikasi')->nullable();
                $table->timestamps();
            });
        }
    }

    #[Test]
    public function it_uses_the_expected_program_code_for_each_study_program(): void
    {
        $this->assertStringStartsWith('260781003', Mahasiswa::generateNipd(1));
        $this->assertStringStartsWith('260781004', Mahasiswa::generateNipd(2));
        $this->assertStringStartsWith('260781007', Mahasiswa::generateNipd(3));
    }
}
