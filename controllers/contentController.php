<?php

class contentController extends superController {

  public function home() {

    $meta['file_name'] = 'home';

    $hub = [
      'Twitter' => [
        'href' => 'https://twitter.com/roman_czerkies',
        'title' => '@roman_czerkies',
      ],
      'LinkedIn' => [
        'href' => 'linkedin',
        'title' => 'Voir le profil professionnel de Roman Czerkies sur LinkedIn',
      ],
      'GitHub' => [
        'href' => 'github',
        'title' => 'Follow their code on GitHub',
      ],
      'Strava' => [
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
