<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virtual Campus - LP3I Karawang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Poppins',sans-serif;margin:0;background:#f5f7fa;color:#123}
        header{background:#004269;color:#fff;padding:1rem 1.5rem}
        .wrap{max-width:1200px;margin:1.5rem auto;padding:0 1rem}
        h1{margin:0 0 .5rem}
        .hero{display:flex;gap:1rem;align-items:center}
        .hero .info{flex:0 0 360px}
        .hero .info p{margin:.35rem 0;color:#234}
        .frame{flex:1;background:#000;border-radius:8px;overflow:hidden;min-height:60vh;box-shadow:0 10px 30px rgba(2,6,23,0.06)}
        .frame iframe{width:100%;height:100%;border:0}
        .frame img{width:100%;height:100%;object-fit:cover;display:block}
        .actions{margin-top:.75rem;display:flex;gap:.5rem}
        .btn{display:inline-block;padding:.55rem .9rem;background:#004269;color:#fff;border-radius:8px;text-decoration:none;font-weight:600}
        .btn.secondary{background:#0b7280}
        .address{background:white;padding:.9rem;border-radius:8px;box-shadow:0 6px 20px rgba(2,6,23,0.04);margin-top:1rem}
        .note{font-size:.95rem;color:#556;margin-top:.5rem}
    </style>
</head>
<body>

    <div class="wrap">
        <div class="hero">
            <div class="info">
                <h1>Virtual Campus LP3I Karawang</h1>
                <p>Alamat: Tarumanegara Blok B No.4-6, Kelurahan Purwadana, Kecamatan Teluk Jambe Timur, Kabupaten Karawang, Jawa Barat</p>
                <div class="actions">
                    
                    <a class="btn secondary" href="https://maps.app.goo.gl/8LyaWJEy1xjiVK1j8" target="_blank" rel="noopener">Buka di Google Maps</a>
                </div>
                <div class="address">
                    <strong>Alamat Lengkap</strong>
                    <div class="note">Tarumanegara Blok B No.4-6, Kelurahan Purwadana, Kecamatan Teluk Jambe Timur, Kabupaten Karawang, Jawa Barat</div>
                </div>
            </div>

            <div class="frame" aria-hidden="false">
                <!-- Gambar Gedung LP3I Karawang -->
                <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" alt="Gedung LP3I Karawang">
            </div>
        </div>

        <p class="note">Catatan: ini menampilkan foto Gedung LP3I Karawang. Klik tombol "Buka di Google Maps" untuk melihat lokasi di peta.</p>
    </div>
</body>
</html>
<?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/virtual.blade.php ENDPATH**/ ?>