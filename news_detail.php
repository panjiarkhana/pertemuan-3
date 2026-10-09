<?php
require_once 'config/database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: news.php');
    exit;
}

$stmt = $conn->prepare("SELECT judul, isi, tanggal_publish FROM berita WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();

if (!$article) {
    header('Location: news.php');
    exit;
}

$pageTitle = $article['judul'] . ' - Telkom University';
require 'includes/header.php';
?>
<section class="section">
  <div class="container article-body">
    <span class="eyebrow">Berita Detail</span>
    <h1><?= htmlspecialchars($article['judul']) ?></h1>
    <p class="meta">Diterbitkan pada <?= date('d M Y', strtotime($article['tanggal_publish'])) ?></p>
    <div><?= nl2br(htmlspecialchars($article['isi'])) ?></div>
    <p style="margin-top:28px;"><a class="btn btn-outline" href="news.php">&laquo; Kembali ke Berita</a></p>
  </div>
</section>
<?php require 'includes/footer.php'; ?>