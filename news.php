<?php
require_once 'config/database.php';
$pageTitle = 'Berita - Telkom University';
$result = $conn->query("SELECT id, judul, ringkasan, tanggal_publish FROM berita ORDER BY tanggal_publish DESC");
require 'includes/header.php';
?>
<section class="section">
  <div class="container">
    <div class="section-heading">
      <span class="eyebrow">Informasi Terbaru</span>
      <h1>Berita & Kegiatan</h1>
      <p class="lead">Daftar berita dinamis yang diambil dari database.</p>
    </div>
    <div class="grid-3">
      <?php while ($row = $result->fetch_assoc()): ?>
        <article class="card">
          <span class="meta"><?= date('d M Y', strtotime($row['tanggal_publish'])) ?></span>
          <h3><?= htmlspecialchars($row['judul']) ?></h3>
          <p><?= htmlspecialchars($row['ringkasan']) ?></p>
          <a class="btn btn-outline" href="news_detail.php?id=<?= $row['id'] ?>">Baca Selengkapnya</a>
        </article>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php require 'includes/footer.php'; ?>