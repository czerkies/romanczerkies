<?php

class contentController extends superController {

  public function home() {

    $meta['file_name'] = 'home';

    $hub = [
      0 => [
        'value' => 'Twitter',
        'href' => 'https://twitter.com/roman_czerkies',
        'title' => '@roman_czerkies',
      ],
      1 => [
        'value' => 'LinkedIn',
        'href' => 'linkedin',
        'title' => 'Voir le profil professionnel de Roman Czerkies sur LinkedIn',
      ],
      2 => [
        'value' => 'GitHub',
        'href' => 'github',
        'title' => 'Follow their code on GitHub',
      ],
      3 => [
        'value' => 'Strava',
        'href' => 'strava',
        'title' => 'Cyclist on Strava',
      ]
    ];

    $functions = new functionsController();

    $this->render(
      $meta,
      ['hub' => $hub, 'functions' => $functions]
    );

  }

}
