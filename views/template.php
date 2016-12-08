<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="<?= $meta['desription']; ?>">
    <title><?= $meta['title']; ?></title>
    <link rel="stylesheet" href="<?= RACINE; ?>css/style.css">
  </head>
  <body>
    <header>
      <a href="<?= RACINE; ?>" title="Accueil">
        <h1><?= $meta['title']; ?></h1>
        <h2>Dev FT FT</h2>
      </a>
    </header>
    <?= $buffer; ?>
  </body>
</html>
