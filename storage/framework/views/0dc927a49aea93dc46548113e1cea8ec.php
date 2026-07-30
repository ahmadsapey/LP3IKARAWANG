<?php
    $images = $images ?? [];
?>

<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penempatan Kerja - LP3I Karawang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #0b7280;
            --brand-light: #f0fdfa;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --bg-body: #f8fafc;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Hero Header Section */
        .hero-header {
            background: linear-gradient(135deg, var(--brand-dark) 0%, #002d4a 100%);
            color: white;
            padding: 120px 1rem 60px;
            text-align: center;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .hero-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .hero-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            font-weight: 300;
        }

        .wrap { 
            max-width: 1280px; 
            margin: -40px auto 80px; 
            padding: 0 clamp(1rem, 3vw, 2rem); 
        }

        .content-intro {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 66, 105, 0.08);
            border-radius: 18px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(2, 6, 23, 0.04);
        }

        .content-intro h2 {
            color: var(--brand-dark);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.35rem;
        }

        .content-intro p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin: 0;
        }

        /* Grid Layout */
        .grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); 
            gap: 1.5rem; 
        }

        /* Card Design */
        .card { 
            background: white; 
            border-radius: 20px; 
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,66,105,0.12);
        }

        /* Poster Image Container */
        .poster-wrapper {
            position: relative;
            overflow: hidden;
            padding-top: 125%; /* 4:5 Aspect Ratio */
            background: #f1f5f9;
        }

        .poster-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .card:hover .poster-wrapper img {
            transform: scale(1.08);
        }

        /* Overlay on Hover */
        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 66, 105, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .card:hover .overlay { opacity: 1; }

        .zoom-icon {
            color: white;
            font-size: 2rem;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(5px);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.3);
        }

        /* Content Meta */
        .meta {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .meta h3 {
            color: var(--brand-dark);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .meta p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        /* Buttons */
        .actions { display: flex; gap: 0.8rem; }

        .btn { 
            flex: 1;
            padding: 0.8rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-download {
            background: var(--brand-dark);
            color: white;
        }

        .btn-download:hover {
            background: var(--brand-accent);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(11, 114, 128, 0.3);
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            background: white;
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 20px;
            border: 2px dashed #e2e8f0;
        }

        /* Modal Styles */
        .modal { 
            display: none; 
            position: fixed; 
            z-index: 9999; 
            inset: 0; 
            background: rgba(15, 23, 42, 0.9); 
            backdrop-filter: blur(8px);
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show { 
            display: flex; 
            align-items: center; 
            justify-content: center;
            opacity: 1;
        }

        .modal-content { 
            position: relative;
            max-width: 100%;
            max-height: 90vh;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal.show .modal-content { transform: scale(1); }

        .modal img { 
            max-width: 90vw; 
            max-height: 85vh; 
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .close-modal {
            position: absolute;
            top: -50px;
            right: 0;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: 0.2s;
        }

        @media (max-width: 768px) {
            .hero-header { padding-top: 100px; }
            .hero-header h1 { font-size: 1.8rem; }
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="hero-header">
        <h1>Bukti Penempatan Kerja</h1>
        <p>Kebanggaan kami adalah melihat alumni sukses di dunia industri sebelum bahkan setelah lulus.</p>
    </section>

    <div class="wrap">
        <div class="content-intro">
            <h2>Galeri Penempatan Kerja</h2>
            <p>Berikut dokumentasi bukti penempatan kerja alumni LP3I Karawang yang telah berkembang di dunia industri.</p>
        </div>
        <div class="grid">
            <?php if(empty($images) || count($images) === 0): ?>
                <div class="empty-state">
                    <i class="fas fa-file-invoice" style="font-size: 3.5rem; color: #cbd5e1; margin-bottom: 1.5rem; display: block;"></i>
                    <h3 style="color: var(--brand-dark)">Belum Ada Data</h3>
                    <p>Bukti penempatan akan segera diperbarui oleh admin.</p>
                </div>
            <?php else: ?>
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $isString = is_string($img);
                    if ($isString) {
                        $url = \Illuminate\Support\Str::startsWith($img, 'http') ? $img : asset($img);
                        $title = 'Poster Sukses Alumni';
                        $description = 'Bukti nyata keterserapan alumni di dunia kerja skala nasional maupun internasional.';
                    } else {
                        $raw = $img->image_path ?? '';
                        if (!empty($raw)) {
                            if (\Illuminate\Support\Str::startsWith($raw, 'http')) {
                                $url = $raw;
                            } elseif (\Illuminate\Support\Str::startsWith($raw, 'storage/')) {
                                $url = asset(ltrim($raw, '/'));
                            } else {
                                $url = asset('storage/' . ltrim($raw, '/'));
                            }
                        } else {
                            $url = '';
                        }
                        $title = $img->title ?? 'Poster Sukses Alumni';
                        $description = $img->description ?? 'Alumni LP3I yang telah sukses meniti karir.';
                    }
                ?>

                <div class="card">
                    <div class="poster-wrapper">
                        <div class="overlay" onclick="openModal('<?php echo e($url); ?>')">
                            <div class="zoom-icon"><i class="fas fa-search-plus"></i></div>
                        </div>
                        <img src="<?php echo e($url); ?>" alt="<?php echo e($title); ?>" loading="lazy">
                    </div>
                    <div class="meta">
                        <h3><?php echo e($title); ?></h3>
                        <p><?php echo e(\Illuminate\Support\Str::limit($description, 100)); ?></p>
                        <div class="actions">
                            <a class="btn btn-download" href="<?php echo e($url); ?>" download>
                                <i class="fas fa-cloud-download-alt"></i> Simpan Poster
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div id="imageModal" class="modal" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <span class="close-modal" onclick="closeModal()"><i class="fas fa-times"></i></span>
            <img id="modalImage" src="" alt="Full size preview">
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modalImg.src = imageSrc;
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Stop scrolling
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto'; // Re-enable scrolling
        }

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") closeModal();
        });
    </script>

</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/penempatan.blade.php ENDPATH**/ ?>