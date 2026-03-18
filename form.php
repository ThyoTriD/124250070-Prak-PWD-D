<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <nav class="nav">
        <img class="logo" src="assets/Logo.png" alt="logo">
        <a id="home-btn" href="index.php">
            <img src="assets/home-icon.png" alt="home-icon">
        </a>
    </nav>

    <form action="landing.php" method="post">
        <div class="container">

            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required>

            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" required>

            <label for="num">Luas Lahan (m²)</label>
            <input type="number" name="luas" id="num" min="1" step="0.1" required>
            <small style="color:#888;">*Minimal 2 m² untuk dapat melanjutkan</small>

        </div>

        <label for="Paket">Paket</label>
        <select id="Paket" name="paket" required>
            <option value="">Pilih Layanan</option>
            <option value="pelajar">Pelajar (Diskon 20%)</option>
            <option value="rumahan">Rumahan (Diskon 10%)</option>
            <option value="industri">Industri (Diskon 5%)</option>
        </select>
        <br>

        <label>Anda Member?</label>
        <label>
            <input type="radio" name="member" value="yes" required/>
            Iya <small style="color:#2ecc71;">(+Diskon 10%)</small>
        </label>
        <label>
            <input type="radio" name="member" value="no" required/>
            Tidak
        </label>
        <br>

        <label>
            <input type="checkbox" name="setuju" required> Saya setuju dengan syarat dan ketentuan
        </label>

        <button type="submit" class="btn btn-success" id="submit">Submit</button>
        <button class="btn btn-secondary" id="reset" type="reset">Reset</button>
    </form>
</body>
</html>
