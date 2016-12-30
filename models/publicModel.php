<?php

/**
 * Gestion des requêtes basiques.
 *
 * @version v10.0.0
 * @link http://romanczerkies.fr/
 * @since v10.0.0
 *
 */
class publicModel extends superModel {

  /**
  * Fonction hubDatas permet de récupérer les réseaux à afficher sur home()
  *
  * @param void
  * @return Object $datas Retourne les datas du hub
  *
  */
  public function hubDatas() {

    $sql = "SELECT value, href, title FROM hub ORDER BY classement";

    $datas = $this->pdo()->query($sql);

    return $datas->fetchAll();

  }

}
