<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_mahasiswa', 'nipd', 'nama_mhs', 'alamat', 'domisili', 'tempat_lahir', 'tgl_lahir', 'angkatan', 'periode',
        'email', 'agama', 'no_tlp', 'tahun_lulus', 'kecamatan', 'desa', 'kode_pos', 'jenis_kelamin', 'jenis_kelas',
        'status_verifikasi', 'payment_status', 'payment_method', 'payment_proof_path', 'payment_bank_origin',
        'payment_account_name', 'payment_sender_name', 'payment_transfer_date', 'payment_expires_at', 'payment_amount',
        'asal_sekolah', 'ktp_path', 'akte_kelahiran_path', 'ijazah_path', 'surat_sudah_bekerja_path',
        'instagram_path', 'nama_wali', 'telp_wali', 'pekerjaan_wali', 'whatsapp_wali', 'foto', 'status',
        'id_user', 'id_program_studi', 'id_kelas'
    ];

    // Compatibility alias so older code can use $mahasiswa->id
    public function getIdAttribute()
    {
        return $this->getKey();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id_user');
    }

    // Generate a NIPD for a given program (numeric program id or legacy code) using config/nipd.php
    public static function generateNipd(string|int|null $program = null): string
    {
        // Use branch_code but replace the leading year portion with the current year (2-digit)
        // so NIPD reflects the actual year automatically.
        $branchCfg = config('nipd.branch_code', '240781');
        $currentYearTwo = date('y');
        // if branch code is at least 2 chars, replace its first two chars with current year two-digit
        $branch = strlen($branchCfg) >= 2 ? ($currentYearTwo . substr($branchCfg, 2)) : $branchCfg;
        $programCodes = config('nipd.program_codes', []);
        $seqDigits = (int) config('nipd.sequence_digits', 4);
        // Normalize program key: accept numeric IDs (1/2/3) or legacy codes (ASE/AIS/OAA)
        $programKey = '';
        if (is_int($program)) {
            $programKey = match ($program) {
                1 => 'AIS',
                2 => 'ASE',
                3 => 'OAA',
                default => '',
            };
        } else {
            $trim = trim((string) ($program ?? ''));
            if (ctype_digit($trim)) {
                $n = (int) $trim;
                $programKey = match ($n) {
                    1 => 'AIS',
                    2 => 'ASE',
                    3 => 'OAA',
                    default => '',
                };
            } else {
                $programKey = strtoupper($trim);
            }
        }
        $deptCode = $programCodes[$programKey] ?? '000';
        $prefix = $branch . $deptCode;

        // Find current max sequence for this prefix using a database query on nipd
        $max = self::where('nipd', 'like', $prefix . '%')
            ->selectRaw("MAX(CAST(SUBSTRING(nipd, -$seqDigits) AS UNSIGNED)) as max_seq")
            ->value('max_seq');

        $next = ((int)$max) + 1;
        $sequence = str_pad((string)$next, $seqDigits, '0', STR_PAD_LEFT);

        return $prefix . $sequence;
    }

    /**
        * Try to find a recent duplicate based on email or phone within a short window.
     * Returns the Mahasiswa model if found, otherwise null.
     */
    public static function findRecentDuplicate(array $attrs, ?int $minutes = 10)
    {
        $query = self::query();

        if ($minutes !== null) {
            $now = \Carbon\Carbon::now();
            $since = $now->subMinutes($minutes);
            $query->where('created_at', '>=', $since);
        }

        $query->where(function($q) use ($attrs) {
            if (!empty($attrs['email'])) {
                $q->orWhere('email', $attrs['email']);
            }

            if (!empty($attrs['no_tlp'])) {
                $q->orWhere(function($q2) use ($attrs) {
                    $q2->where('no_tlp', $attrs['no_tlp']);
                    if (!empty($attrs['nama_mhs'])) {
                        $q2->where('nama_mhs', $attrs['nama_mhs']);
                    }
                });
            }
        });

        // Jika ingin lebih spesifik, tambahkan pengecekan lain di sini

        return $query->orderByDesc('id_mahasiswa')->first();
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            $status = trim(strtolower((string) ($model->status_verifikasi ?? '')));
            $nipd = strtoupper(trim((string) ($model->nipd ?? '')));
            $isPlaceholder = $nipd !== '' && str_starts_with($nipd, 'PND');

            // If already verified (or becoming verified) and nipd is missing/placeholder, generate a real NIPD.
            if ($status === 'verified' && (empty($model->nipd) || $isPlaceholder)) {
                $model->nipd = self::generateNipd(
                    $model->id_program_studi ?? ($model->id_program_study ?? null)
                );
            }
        });

        static::creating(function ($model) {
            $status = trim(strtolower((string) ($model->status_verifikasi ?? '')));
            $nipd = strtoupper(trim((string) ($model->nipd ?? '')));
            $isPlaceholder = $nipd !== '' && str_starts_with($nipd, 'PND');
            if ($status === 'verified' && (empty($model->nipd) || $isPlaceholder)) {
                $model->nipd = self::generateNipd(
                    $model->id_program_studi ?? ($model->id_program_study ?? null)
                );
            }
        });

        static::updating(function ($model) {
            if (!$model->isDirty('status_verifikasi')) {
                return;
            }

            $status = trim(strtolower((string) ($model->status_verifikasi ?? '')));
            $nipd = strtoupper(trim((string) ($model->nipd ?? '')));
            $isPlaceholder = $nipd !== '' && str_starts_with($nipd, 'PND');
            if ($status === 'verified' && (empty($model->nipd) || $isPlaceholder)) {
                $model->nipd = self::generateNipd(
                    $model->id_program_studi ?? ($model->id_program_study ?? null)
                );
            }
        });
    }

    /**
     * Create a Mahasiswa with automatic NIPD generation and retry on NIPD collisions.
     * This helps avoid race conditions where two concurrent requests generate the same NIPD.
     *
     * @param array $attrs
     * @param int $maxAttempts
     * @return self
     * @throws \Throwable
     */
    public static function createWithUniqueNipd(array $attrs, int $maxAttempts = 5): self
    {
        $attrs = self::normalizeForInsert($attrs);
        $status = trim(strtolower((string) ($attrs['status_verifikasi'] ?? '')));
        $shouldGenerate = ($status === 'verified');
        $attempt = 0;
        do {
            $attempt++;
            // Only generate a real NIPD when the record is verified.
            if ($shouldGenerate && empty($attrs['nipd'])) {
                $attrs['nipd'] = self::generateNipd($attrs['id_program_studi'] ?? ($attrs['id_program_study'] ?? null));
            }

            try {
                $attrs = self::normalizeForInsert($attrs);
                return self::create($attrs);
            } catch (\Illuminate\Database\QueryException $e) {
                $msg = strtolower($e->getMessage());
                // Detect NIPD-specific unique constraint failure (SQLite message, MySQL, PostgreSQL variants)
                if ($shouldGenerate && (str_contains($msg, 'nipd') || str_contains($msg, 'mahasiswas_nipd') || str_contains($msg, 'mahasiswas.nipd'))) {
                    \Illuminate\Support\Facades\Log::warning('NIPD collision detected, retrying create', ['attempt' => $attempt, 'error' => $e->getMessage()]);
                    // Remove nipd so next loop generates a fresh one
                    unset($attrs['nipd']);
                    if ($attempt >= $maxAttempts) {
                        // give up and rethrow the DB exception
                        throw $e;
                    }
                    // small backoff to reduce thundering herd in very tight loops
                    usleep(100000); // 100ms
                    continue;
                }
                // Not a NIPD collision — rethrow
                throw $e;
            }
        } while ($attempt <= $maxAttempts);

        throw new \RuntimeException("Failed to create Mahasiswa after {$maxAttempts} attempts due to NIPD collisions.");
    }

    /**
     * Normalize attrs to satisfy DB constraints (ENUM/NOT NULL/defaults) without hardcoding every column.
     * This is especially useful when the database schema differs from local migrations.
     */
    private static function normalizeForInsert(array $attrs): array
    {
        $meta = self::getMahasiswaColumnMeta();
        if (empty($meta)) {
            return $attrs;
        }

        foreach ($attrs as $key => $value) {
            if (!isset($meta[$key])) {
                continue;
            }

            $column = $meta[$key];
            $isNullable = ($column['is_nullable'] ?? 'YES') === 'YES';
            $dataType = strtolower((string) ($column['data_type'] ?? ''));
            $columnTypeRaw = (string) ($column['column_type'] ?? '');
            $columnTypeLower = strtolower($columnTypeRaw);
            $default = $column['column_default'] ?? null;

            $isEmptyString = is_string($value) && trim($value) === '';
            $isNull = $value === null;

            // ENUM columns: coerce invalid/empty values to a valid enum option.
            if (str_starts_with($columnTypeLower, 'enum(')) {
                $enumValues = self::parseEnumValues($columnTypeRaw);

                $normalized = null;
                if ($isNull) {
                    $normalized = null;
                } elseif (is_string($value)) {
                    $normalized = trim($value);
                } else {
                    $normalized = (string) $value;
                }

                $isValid = $normalized !== null && in_array($normalized, $enumValues, true);
                if ($isValid) {
                    continue;
                }

                if ($isNullable) {
                    $attrs[$key] = null;
                    continue;
                }
                if ($default !== null && $default !== '') {
                    $attrs[$key] = $default;
                    continue;
                }

                $attrs[$key] = $enumValues[0] ?? '';
                continue;
            }

            if (!$isNull && !$isEmptyString) {
                continue;
            }

            // If nullable, prefer NULL for absent values.
            if ($isNullable) {
                $attrs[$key] = null;
                continue;
            }

            // NOT NULL fallback values based on data type
            if ($default !== null) {
                $attrs[$key] = $default;
                continue;
            }

            if ($dataType === 'date') {
                $attrs[$key] = '1900-01-01';
                continue;
            }
            if ($dataType === 'datetime' || $dataType === 'timestamp') {
                $attrs[$key] = now()->toDateTimeString();
                continue;
            }

            $numericTypes = ['int', 'integer', 'bigint', 'smallint', 'mediumint', 'tinyint', 'decimal', 'float', 'double'];
            if (in_array($dataType, $numericTypes, true)) {
                $attrs[$key] = 0;
                continue;
            }

            // Default for NOT NULL text-ish columns
            $attrs[$key] = '';
        }

        return $attrs;
    }

    private static function getMahasiswaColumnMeta(): array
    {
        static $cache = null;
        if (is_array($cache)) {
            return $cache;
        }

        try {
            $dbName = DB::getDatabaseName();
            if (empty($dbName)) {
                $cache = [];
                return $cache;
            }

            $rows = DB::select(
                'SELECT COLUMN_NAME, IS_NULLABLE, DATA_TYPE, COLUMN_TYPE, COLUMN_DEFAULT\n'
                . 'FROM information_schema.COLUMNS\n'
                . 'WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?'
                , [$dbName, 'mahasiswa']
            );

            $cache = [];
            foreach ($rows as $row) {
                $cache[$row->COLUMN_NAME] = [
                    'is_nullable' => $row->IS_NULLABLE,
                    'data_type' => $row->DATA_TYPE,
                    'column_type' => $row->COLUMN_TYPE,
                    'column_default' => $row->COLUMN_DEFAULT,
                ];
            }

            if (!empty($cache)) {
                return $cache;
            }
        } catch (\Throwable $e) {
            // ignore and try fallback
        }

        // Fallback for MySQL users without information_schema privileges.
        try {
            if (DB::getDriverName() !== 'mysql') {
                $cache = [];
                return $cache;
            }

            $cols = DB::select('SHOW COLUMNS FROM `mahasiswa`');
            $cache = [];

            foreach ($cols as $col) {
                $type = (string) ($col->Type ?? '');
                $typeLower = strtolower($type);
                $dataType = '';

                if (str_starts_with($typeLower, 'enum(')) {
                    $dataType = 'enum';
                } elseif (str_starts_with($typeLower, 'varchar') || str_starts_with($typeLower, 'char')) {
                    $dataType = 'varchar';
                } elseif (str_starts_with($typeLower, 'text') || str_contains($typeLower, 'text')) {
                    $dataType = 'text';
                } elseif ($typeLower === 'date') {
                    $dataType = 'date';
                } elseif (str_starts_with($typeLower, 'datetime')) {
                    $dataType = 'datetime';
                } elseif (str_starts_with($typeLower, 'timestamp')) {
                    $dataType = 'timestamp';
                } elseif (preg_match('/int\b/i', $type)) {
                    $dataType = 'int';
                } elseif (preg_match('/decimal|float|double/i', $type)) {
                    $dataType = 'decimal';
                } else {
                    $dataType = $typeLower;
                }

                $cache[$col->Field] = [
                    'is_nullable' => (($col->Null ?? 'YES') === 'YES') ? 'YES' : 'NO',
                    'data_type' => $dataType,
                    'column_type' => $type,
                    'column_default' => $col->Default ?? null,
                ];
            }

            return $cache;
        } catch (\Throwable $e) {
            $cache = [];
            return $cache;
        }
    }

    /** @return array<int, string> */
    private static function parseEnumValues(string $columnType): array
    {
        if (!preg_match("/^enum\\((.*)\\)$/i", trim($columnType), $m)) {
            return [];
        }

        $inner = $m[1];
        $values = str_getcsv($inner, ',', "'");
        return array_values(array_filter(array_map('strval', $values), fn ($v) => $v !== ''));
    }
}

