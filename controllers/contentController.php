<?php

class contentController extends superController {

  public function home() {

    $meta['file_name'] = 'home';

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
