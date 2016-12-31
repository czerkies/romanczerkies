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
        <h1><?= H1; ?></h1>
        <h2><?= H2; ?></h2>
      </a>
    </header>
<?= $buffer; ?>
    <!-- romanczerkies.fr Version 10.0. ©<?= date('Y'); ?> Roman Czerkies. Tous droits réservés. - SIRET 79321556700017-->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:103348,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
  </body>
</html>
