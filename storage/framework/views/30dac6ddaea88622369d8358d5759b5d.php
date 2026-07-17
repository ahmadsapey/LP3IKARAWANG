<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi LP3I</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
        * {
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        :root {
            --lp3i-blue: #2c5e8c;
            --lp3i-light-blue: #7ca8d2;
            --lp3i-dots: #94a3b8;
        }

        @page {
            size: A4 landscape;
            margin: 14mm;
        }

        body {
            background: #ffffff;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
            margin: 0;
        }

        .receipt-container {
            width: 100%;
            max-width: 950px;
            height: 500px; /* keep the sample ratio */
            background-color: white;
            position: relative;
            padding: 30px 40px;
            box-sizing: border-box;
            overflow: hidden;
            border: 1px solid rgba(44, 94, 140, 0.35);
            margin: 0 auto;
        }

        .pattern-img {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 160px;
            height: auto;
            opacity: 0.9;
            z-index: 0;
        }

        .logo-img {
            width: 200px;
            height: auto;
            display: block;
        }

        .header-text {
            color: var(--lp3i-blue);
            line-height: 1.1;
            font-size: 20px;
            font-weight: 500;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 22px;
        }

        .layout {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            position: relative;
            z-index: 1;
        }

        .layout td {
            padding: 0;
            vertical-align: top;
        }

        .footer-cell {
            vertical-align: bottom;
            padding-top: 10px;
        }

        .label {
            color: var(--lp3i-blue);
            font-size: 18px;
            width: 220px;
            display: inline-block;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td {
            padding: 6px 0;
            vertical-align: bottom;
        }

        .colon {
            width: 16px;
            color: var(--lp3i-blue);
            font-size: 18px;
            padding-left: 6px;
        }

        .fill {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        .fill td {
            padding: 0;
            vertical-align: bottom;
        }

        .fill .val {
            color: var(--lp3i-blue);
            font-weight: 700;
            font-size: 16px;
            white-space: nowrap;
            padding-right: 10px;
            width: 1%;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .fill .dots {
            width: 99%;
            border-bottom: 1.5px dotted var(--lp3i-dots);
            height: 18px;
        }

        /* Multi rules area (PDF-safe lines) */
        .rules-box {
            height: 30px;
            opacity: 0.9;
        }

        .rules-box .rules {
            padding-top: 4px;
        }

        .rules-box .rules .r {
            border-bottom: 1.5px solid var(--lp3i-blue);
            margin-bottom: 3px;
        }

        .rules-box .value {
            font-size: 16px;
            color: var(--lp3i-blue);
            font-weight: 700;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .footer {
            width: 100%;
            border-collapse: collapse;
        }

        .footer td {
            vertical-align: bottom;
        }

        .amount-box {
            display: none;
        }

        .amount-table {
            border-collapse: collapse;
            width: auto;
        }

        .amount-table td {
            padding: 0;
            vertical-align: middle;
            white-space: nowrap;
        }

        .rp-cell {
            padding-right: 10px;
        }

        .rp-label {
            color: var(--lp3i-blue);
            font-weight: 700;
            font-size: 22px;
            margin-right: 10px;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .amount-lines {
            width: 220px;
            height: 25px;
            position: relative;
            opacity: 0.9;
        }

        .amount-lines .rules {
            padding-top: 4px;
        }

        .amount-lines .rules .r {
            border-bottom: 1.5px solid var(--lp3i-blue);
            margin-bottom: 3px;
        }

        .amount-lines .value {
            position: absolute;
            left: 0;
            top: 0;
            font-size: 18px;
            color: var(--lp3i-blue);
            font-weight: 800;
            background: #ffffff;
            padding-right: 10px;
            white-space: nowrap;
            line-height: 25px;
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }

        .signature-line {
            width: 250px;
            border-bottom: 1.5px solid var(--lp3i-blue);
            margin-left: auto;
        }
    </style>
</head>
<body>

    <?php
        $receiptDate = !empty($date) ? \Carbon\Carbon::parse($date) : now();
        $baseNo = $calon->nipd ?? ($calon->id_mahasiswa ?? ($calon->id ?? ''));
        $receiptNo = 'KWT-' . ($baseNo !== '' ? $baseNo : '000') . '-' . $receiptDate->format('Ymd');
        $amountNumber = is_numeric($amount ?? null) ? (float) $amount : (float) preg_replace('/[^0-9.]/', '', (string) ($amount ?? 0));
        $amountFormatted = number_format($amountNumber, 0, ',', '.');
        $payerName = $calon->nama_mhs ?? '-';
        $program = \App\Helpers\JurusanHelper::getFormat($calon->id_program_studi ?? ($calon->id_program_study ?? null));
        $paymentDesc = 'Pembayaran Biaya Pendaftaran' . (!empty($program) ? ' - ' . $program : '');

        $embedImage = function (string $path): ?string {
            if (!is_file($path)) return null;
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            $mime = match ($ext) {
                'png' => 'image/png',
                'jpg', 'jpeg' => 'image/jpeg',
                'svg' => 'image/svg+xml',
                default => 'application/octet-stream',
            };
            $data = base64_encode(file_get_contents($path));
            return "data:{$mime};base64,{$data}";
        };

        $logoFile = public_path('storage/image/LOGO_LP3I_BLUE.png');
        $patternFile = public_path('storage/image/pattern.png');

        $logoSrc = $embedImage($logoFile) ?? str_replace('\\', '/', $logoFile);
        $patternSrc = $embedImage($patternFile) ?? str_replace('\\', '/', $patternFile);
    ?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran</title>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }
        /* ...existing code... */
    </style>
</head>
<body>
    
    <div class="receipt-container">
        <?php if(!empty($patternSrc)): ?>
            <img class="pattern-img" src="<?php echo e($patternSrc); ?>" alt="Pattern" />
        <?php endif; ?>
        <table class="layout">
            <div class="header">
    <img class="logo-img" src="<?php echo e($logoSrc); ?>" alt="LP3I Logo" />
    <div>
        <div style="font-weight:700; font-size:20px; color:#2c5e8c; margin-top:2px;">
            Lembaga Pendidikan<br>
            Dan Pengembangan<br>
            Profesi Indonesia
        </div>
    </div>
</div>
<br>
<br>
            <tr>
                <td>
                    <!-- Body Section -->
                    <table class="table">
                        <tr>
                            <td class="label" style="min-width: 50px;">No.</td>
                            <td class="colon"></td>
                            <td>
                                <table class="fill" style="max-width: 520px;">
                                    <tr>
                                        <td class="val"><?php echo e($receiptNo); ?></td>
                                        <td class="dots"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Telah terima dari</td>
                            <td class="colon">:</td>
                            <td>
                                <table class="fill" style="max-width: 680px;">
                                    <tr>
                                        <td class="val"><?php echo e($payerName); ?></td>
                                        <td class="dots"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Uang sejumlah</td>
                            <td class="colon">:</td>
                            <td>
                                <div class="rules-box" style="max-width: 680px;">
                                    <div class="value">Rp <?php echo e($amountFormatted); ?></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Untuk pembayaran</td>
                            <td class="colon">:</td>
                            <td>
                                <table class="fill" style="max-width: 680px;">
                                    <tr>
                                        <td class="val"><?php echo e($paymentDesc); ?></td>
                                        <td class="dots"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="label" style="visibility:hidden;">Untuk pembayaran</td>
                            <td class="colon" style="visibility:hidden;">:</td>
                            <td>
                                <table class="fill" style="max-width: 680px;">
                                    <tr>
                                        <td class="val"><?php echo e($receiptDate->format('d-m-Y')); ?></td>
                                        <td class="dots"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td class="footer-cell">
                    <table class="footer">
                        <tr>
                            <td style="width: 350px;">
                                <table class="amount-table">
                                    <tr>
                                        <td class="rp-cell"><span class="rp-label">Rp.</span></td>
                                        <td>
                                            <div class="amount-lines">
                                                <span class="value"><?php echo e($amountFormatted); ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="signature-line"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>

</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/pendaftar/receipt.blade.php ENDPATH**/ ?>