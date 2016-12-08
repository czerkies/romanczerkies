<?php

/**
*
* Parametres du framework.
*
*/

// Parametres pour la connection à la base de donnéees.
define('PARAM_DB',[
  'localhost', //DSN
  'romanczerkies', // Nom de la base
  'root', // Utilisateur
  'root' // Mot de passe
]);

// Définition de la racine du site
define('RACINE', '/romanczerkies/www/');
define('RACINE_SERVER', $_SERVER['DOCUMENT_ROOT']);

// Affichage des erreurs
define('LOG', TRUE);

// Constantes
define('FIRST_TITLE', 'Name LastName');
define('SECOND_TITLE', 'Dev ft web');
define('EMAIL', 'roman.czerkies@gmail.com');
