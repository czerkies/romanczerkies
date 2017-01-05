<?php

  header('Content-type: application/xml');

  include '../conf/params.php';
  include '../controllers/superController.php';
  include '../models/superModel.php';

  $model = new superModel();
  $sql = "SELECT url FROM pages WHERE restriction = 0 AND url IS NOT NULL";
  $datas = $model->pdo()->query($sql);
  $urls = $datas->fetchAll();

  echo '<?xml version="1.0" encoding="UTF-8"?>
  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

?>
<url>
  <loc>http://<?= $_SERVER['SERVER_NAME'] . RACINE; ?></loc>
  <priority>1</priority>
</url>
<?php if($urls) foreach ($url as $value): ?>
  <url>
    <loc>http://<?= $_SERVER['SERVER_NAME'] . $value['url']; ?></loc>
  </url>
<?php endforeach; ?>
</urlset>
