<?php

/**
 * Gestion des requêtes basiques.
 *
 *
 * @version v10.0.0
 * @link http://romanczerkies.fr/
 * @since v10.0.0-alpha
 */
class publicModel extends superModel {

  public function hubDatas() {

    $sql = "SELECT value, href, title FROM hub ORDER BY classement";

    $datas = $this->pdo()->query($sql);

    return $datas->fetchAll();

  }

}
