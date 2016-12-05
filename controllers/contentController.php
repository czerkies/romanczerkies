<?php

class contentController extends superController {

  public function home() {

    $meta['file_name'] = 'home';

    $hello = 'Hello World';

    $this->render(
      $meta,
      ['hello' => $hello]
    );

  }

}
