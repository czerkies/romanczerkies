<?php

/**
 * Class gérant l'affichage
 *
 * Rend et gère l'affichage de la page demandé via le routeur.
 *
 * @version v10.0.0
 * @link http://romanczerkies.fr/
 * @since v10.0.0
 *
 */
class superController {

  /**
  * Fonction permettant l'affichage dans le template.
  *
  * @param Array $meta Chemin du fichier à afficher
  * @return void
  *
  */
  public function render($meta = array(), $datas = array()) {

    // Démarage de la 'session'
    if (SESSION) session_start();

    // Chargement des données depuis la DB.
    $page = new superModel();
    $metaDB = $page->metaDatas($meta['file_name']);

    // Assignation des données si existante à la variable 'meta'
    if ($metaDB) foreach ($metaDB as $key => $value) if (!isset($meta[$key])) $meta[$key] = $metaDB[$key];

    // Vérification de la restriction
    if (RESTRICTION) {

      $userStatus = $_SESSION['membre']['status'] ?? 0;
      if(isset($meta['restriction']) && $meta['restriction'] > $userStatus) $meta = $page->metaDatas('restriction');

    }

    // Controle de l'existance des valeurs et de la page
    if (!isset($meta['folder']) || !isset($meta['file_name'])
    || !file_exists('../views/' . $meta['folder'] . '/' . $meta['file_name'] . '.php')) $meta = $page->metaDatas('errorUrl');

    // Si des données sont envoyées alors extraction
    if (isset($datas)) extract($datas);

    // Affichage content
    ob_start();
    include_once '../views/' . $meta['folder'] . '/' . $meta['file_name'] . '.php';
    $buffer = ob_get_contents();
    ob_end_clean();
    // Chargement du template
    include_once '../views/template.php';

  }

  /**
  * Renvoie et affiche une page de type 404.
  *
  * @param void
  * @return void
  *
  */
  public function errorUrl() {

    // header pour document error 404
    header('http/1.0 404 Not Found');
    $this->render($meta = ['file_name' => __FUNCTION__]);
    exit;

  }

  /**
  * Method permettant d'afficher une erreur survenue lors de son appel dans le framework.
  * Peut-être désactivé dans le 'param.php' en passant la valeur 'LOG' à 'FALSE'.
  *
  * @param String $class Récupère le nom de la class.
  * @param String $function Récupère le nom de la method.
  * @param String $explain Text d'explication de l'erreur.
  * @return String $error (echo)
  *
  */
  public function displayError($class = NULL, $function = NULL, $explain = NULL) {

    $error = '';

    if ($class !== NULL || $function !== NULL) $error .= 'Erreur dans la method <b>' . $function . '</b> de la class <b>' . $class . '</b>.<br>';
    if ($explain) $error .= 'Informations : ' . $explain;

    $error .= '<hr>';

    if (LOG) echo $error;

    return FALSE;

  }

}
