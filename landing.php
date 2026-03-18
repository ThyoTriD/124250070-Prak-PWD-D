<?php

$nama   = isset($_POST['nama'])   ? htmlspecialchars(trim($_POST['nama']))   : '';
$email  = isset($_POST['email'])  ? htmlspecialchars(trim($_POST['email']))  : '';
$luas   = isset($_POST['luas'])   ? (float) $_POST['luas']                  : 0;
$paket  = isset($_POST['paket'])  ? $_POST['paket']                         : '';
$member = isset($_POST['member']) ? $_POST['member']                        : 'no';

$harga_per_meter = 50000;

$daftar_paket = [
    'pelajar' => ['label' => 'Pelajar',  'diskon' => 20],
    'rumahan' => ['label' => 'Rumahan',  'diskon' => 10],
    'industri'=> ['label' => 'Industri', 'diskon' => 5],
];

$diskon_member = [
    'yes' => 10,   
    'no'  => 0,   
];

$lulus_syarat = true;
$pesan_error  = '';

if ($luas < 2) {

    $lulus_syarat = false;
    $pesan_error  = "Luas lahan <strong>{$luas} m²</strong> tidak memenuhi persyaratan minimum. 
                     Lahan harus minimal <strong>2 m²</strong> untuk dapat melanjutkan.";
} elseif (!array_key_exists($paket, $daftar_paket)) {
    $lulus_syarat = false;
    $pesan_error  = "Paket yang dipilih tidak valid.";
}

$harga_dasar     = 0;
$diskon_paket    = 0;
$diskon_anggota  = 0;
$total_diskon    = 0;
$harga_akhir     = 0;
$label_paket     = '';

if ($lulus_syarat) {
    $harga_dasar    = $luas * $harga_per_meter;
    $diskon_paket   = $daftar_paket[$paket]['diskon'];
    $diskon_anggota = $diskon_member[$member];
    $label_paket    = $daftar_paket[$paket]['label'];

    $total_diskon = min($diskon_paket + $diskon_anggota, 100);
    $harga_akhir  = $harga_dasar * (1 - $total_diskon / 100);
}

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

$no_order = 'ORD-' . strtoupper(substr(md5($nama . $email . time()), 0, 8));
$tgl_order = date('d F Y, H:i') . ' WIB';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lulus_syarat ? 'Resi Order #' . $no_order : 'Tidak Memenuhi Syarat' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/landing.css">
       
</head>
<body>
    <nav class="nav">
        <img class="logo" src="assets/Logo.png" alt="logo">
        <a id="home-btn" href="index.php">
            <img src="assets/home-icon.png" alt="home-icon">
        </a>
    </nav>

<?php if (!$lulus_syarat): ?>

    <div class="error-box">
        <div style="font-size:4rem;">⚠️</div>
        <h2 style="color:#c0392b; margin:15px 0 10px;">Tidak Memenuhi Persyaratan</h2>
        <p style="color:#555;"><?= $pesan_error ?></p>
        <hr>
        <p style="color:#888; font-size:.9rem;">Silakan kembali dan perbaiki data lahan kamu.</p>
        <a href="form.php" class="btn btn-success mt-2" style="background:#0f4d1c; border:none; padding:10px 28px; border-radius:8px;">← Kembali ke Form</a>
    </div>

<?php else: ?>

    <div class="receipt-wrapper">

        <div class="receipt-header">
            <div>
                <div class="brand">ORDER BERHASIL</div>
                <div style="font-size:.78rem; opacity:.75; margin-top:4px;">Resi Pembayaran</div>
            </div>
            <div class="order-info">
                <div style="opacity:.7; margin-bottom:3px;">No. Order</div>
                <strong><?= $no_order ?></strong>
                <div style="margin-top:6px; opacity:.7;"><?= $tgl_order ?></div>
            </div>
        </div>

        <div class="status-bar">
            <div class="dot"></div>
            <span>Order <strong>berhasil diterima</strong> — konfirmasi akan dikirim ke <strong><?= $email ?></strong></span>
        </div>

        <div class="receipt-body">

            <div class="sec-title">Data Pelanggan</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="lbl">Nama Lengkap</div>
                    <div class="val"><?= $nama ?></div>
                </div>
                <div class="info-item">
                    <div class="lbl">Email</div>
                    <div class="val" style="font-size:.82rem;"><?= $email ?></div>
                </div>
                <div class="info-item">
                    <div class="lbl">Luas Lahan</div>
                    <div class="val"><?= $luas ?> m²</div>
                </div>
                <div class="info-item">
                    <div class="lbl">Status</div>
                    <div class="val">
                        <?php if ($member === 'yes'): ?>
                            <span class="badge-member">✔ Member</span>
                        <?php else: ?>
                            <span class="badge-non">Non-Member</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="sec-title" style="margin-top:24px;">Rincian Item</div>
            <table class="item-table">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga Satuan</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="font-weight:600; color:#111;">Jasa Perawatan Lahan</div>
                            <div style="font-size:.78rem; color:#888;">Paket <?= $label_paket ?></div>
                        </td>
                        <td class="text-center"><?= $luas ?> m²</td>
                        <td class="text-end"><?= rupiah($harga_per_meter) ?>/m²</td>
                        <td class="text-end"><?= rupiah($harga_dasar) ?></td>
                    </tr>
                    <?php if ($diskon_paket > 0): ?>
                    <tr>
                        <td colspan="3" style="color:#e74c3c; font-size:.83rem; padding-left:16px;">
                            Diskon Paket <?= $label_paket ?> (<?= $diskon_paket ?>%)
                        </td>
                        <td class="text-end" style="color:#e74c3c; font-size:.83rem;">
                            - <?= rupiah($harga_dasar * $diskon_paket / 100) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($diskon_anggota > 0): ?>
                    <tr>
                        <td colspan="3" style="color:#e74c3c; font-size:.83rem; padding-left:16px;">
                            Diskon Member (<?= $diskon_anggota ?>%)
                        </td>
                        <td class="text-end" style="color:#e74c3c; font-size:.83rem;">
                            - <?= rupiah($harga_dasar * $diskon_anggota / 100) ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="summary-box">
                <div class="summary-row">
                    <span>Harga Normal</span>
                    <?php if ($total_diskon > 0): ?>
                        <span class="strike"><?= rupiah($harga_dasar) ?></span>
                    <?php else: ?>
                        <span><?= rupiah($harga_dasar) ?></span>
                    <?php endif; ?>
                </div>
                <?php if ($total_diskon > 0): ?>
                <div class="summary-row">
                    <span>Total Potongan <span class="diskon-tag">(<?= $total_diskon ?>%)</span></span>
                    <span class="diskon-tag">- <?= rupiah($harga_dasar - $harga_akhir) ?></span>
                </div>
                <?php endif; ?>
                <div class="summary-row divider total">
                    <span>Total yang Dibayar</span>
                    <span><?= rupiah($harga_akhir) ?></span>
                </div>
            </div>

            <div class="btn-actions">
                <a href="index.php" class="btn-home">Kembali ke Home</a>
            </div>

        </div>

        <div class="receipt-footer">
            <div>Terima kasih telah mempercayakan lahan Anda kepada LadangKu</div>
            <div style="margin-top:4px;">Simpan resi ini sebagai bukti pemesanan · <?= $no_order ?></div>
        </div>

    </div>
<?php endif; ?>

</body>
</html>
