<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="<?= $meta['description']; ?>">
    <title><?= $meta['title']; ?></title>
    <link rel="stylesheet" href="<?= RACINE; ?>css/style.css">
  </head>
  <body>
    <header>
      <a href="<?= RACINE; ?>" title="Accueil">
        <h1><?= FIRST_TITLE; ?></h1>
        <h2><?= SECOND_TITLE; ?></h2>
      </a>
    </header>
<?= $buffer; ?>
  </body>
</html>
