<?php

/**
 * Controller des différentes pages
 *
 * Rend et gère l'affichage de la page demandé via le routeur.
 *
 * @version v10.0.0
 * @link http://romanczerkies.fr/
 * @since v10.0.0
 *
 */
class contentController extends superController {

  /**
  * Affichage de la page d'accueil
  *
  * @param void
  *
  * @return function render()
  *
  */
  public function home() {

    $meta['file_name'] = __FUNCTION__;

    $db = new publicModel();
    $hub = $db->hubDatas();

    $functions = new functionsController();

    if ($_POST) $post = $functions->contactPost();
    else $post = NULL;

    $this->render(
      $meta,
      ['hub' => $hub, 'functions' => $functions, 'post' => $post]
    );

  }

}
