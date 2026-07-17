
<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Email</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{--basic:#004269;--adv:#40826D}
    body{background:var(--basic);}
    .card-adv{border:1px solid var(--adv);box-shadow:0 6px 18px rgba(0,0,0,0.08);background:#fff;color:#0f172a}
    .card-adv .field-box{background:#fff;color:#0f172a}
    .card-adv label{color:#475569}
    .btn-basic{background:linear-gradient(90deg,var(--basic),#009DA5);box-shadow:0 6px 12px rgba(0,0,0,0.12)}
    input, select, textarea { border-width: 2px !important; border-color: rgba(15,23,42,0.08) !important; }
  </style>
</head>
<body class="text-slate-800">
  <?php echo $__env->make('partials.header_pendaftar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <div class="max-w-6xl mx-auto p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-6 items-start">
      <?php echo $__env->make('partials.sidebar_pendaftar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <main>
        <div class="bg-white rounded-xl card-adv p-6">
          <div class="flex items-center justify-between">
              <div>
                <h2 class="text-2xl font-bold text-[#004269]">Ubah Email</h2>
                <p class="text-sm text-slate-500">Perbarui alamat email akun Anda.</p>
              </div>
          </div>

          <?php if(session('success')): ?>
            <div class="p-3 mt-4 rounded bg-green-50 text-green-700"><?php echo e(session('success')); ?></div>
          <?php endif; ?>

          <form action="<?php echo e(route('pendaftar.akun.email.update')); ?>" method="POST" class="mt-5">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="md:col-span-2 field-box p-4 rounded">
                <label class="block text-sm mb-1">Email Baru</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="<?php echo e(old('email', Auth::user()->email ?? '')); ?>">
              </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
              <a href="<?php echo e(route('pendaftar.biodata.show')); ?>" class="px-4 py-2 rounded-md border-2 border-[#004269] text-[#004269]">Batal</a>
              <button type="submit" class="px-4 py-2 rounded-md text-white font-semibold btn-basic">Simpan</button>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/pendaftar/account/email.blade.php ENDPATH**/ ?>