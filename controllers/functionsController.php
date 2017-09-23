<?php

/**
 * La class functionsController gère les fonctions du site.
 *
 * Génération des champs de formulaire et traintement du contact.
 *
 * @version v10.1
 * @link http://romanczerkies.fr/
 * @since v10.0.0
 *
 */
class functionsController extends superController {

  /**
  * Permet de générer un champs de type "input"
  *
  * @param $label string
  * @param $type string
  * @param $name string
  * @param $placeholder string
  * @param $em string
  * @param $msg array
  * @param $class string (optional)
  * @param $input string (optional)
  *
  * @return $field string
  *
  */
  public function fieldsFormInput($name = '', $type = 'text', $id = FALSE, $required = FALSE, $value = '', $attr = array()) {

    $listType = ['text', 'number', 'email', 'tel', 'submit'];

    $field = '';

    if (in_array($type, $listType)) {

      $field .= '<input type="' . $type . '"';
      if ($name) $field .= ' name="' . $name . '"';
      if ($id) $field .= ' id="' . $name . '"';
      if ($attr) foreach ($attr as $key => $val) if(!empty($val)) $field .= ' ' . $key . '="' . $val . '"';
      if (isset($_POST[$name]) && !empty($_POST[$name])) $field .= ' value="' . $_POST[$name] . '"';
      elseif ($value) $field .=  ' value="' . $value . '"';
      if ($required) $field .= ' required';
      $field .= ">\n";

      echo $field;

    } else {

      self::displayError(__CLASS__, __FUNCTION__, "Attribuez un nom à votre champs.");

    }


  }

  /**
  * Permet de générer un champs de type "textarea"
  *
  * @param $label string
  * @param $type string
  * @param $name string
  * @param $placeholder string
  * @param $em string
  * @param $msg array
  * @param $class string (optional)
  * @param $input string (optional)
  *
  * @return $field string
  *
  */
  public function fieldsFormTextarea($name = '', $id = FALSE, $required = FALSE, $value = NULL, $attr = array()) {

    $field = '';

    $field .= '<textarea name="' . $name . '"';
    if ($id) $field .= ' id="' . $name . '"';
    if ($attr) foreach ($attr as $key => $val) if(!empty($val)) $field .= ' ' . $key . '="' . $val . '"';
    if ($required) $field .= ' required';
    $field .= '>';
    if(!$attr['placeholder']) if (isset($_POST[$name]) && !empty($_POST[$name])) $field .= $_POST[$name];
    elseif ($value) $field .= $value;
    $field .= "</textarea>\n";

    echo $field;

  }


  /**
  * Fonction d'envoie de mail avec chargment du template
  *
  * @param $to string Mail à envoyer
  * @param $subject string Sujet du mail
  * @param $content string Content du mail
  * @param $templateName string Nom du template ('contact')
  * @param $from string (optional) Mail de EMAIL
  *
  * @return bool Retour de la fonction mail
  *
  */
  public function sendMail($to, $subject, $content, $templateName = 'contact', $from = EMAIL) {

    $headers = 'Content-Type: text/html; charset=\"UTF-8\";' . "\r\n";
    $headers .= 'FROM: ' . H1 . ' <' . $from . '>' . "\r\n";
    $headers .= 'Bcc: ' . EMAIL . "\r\n";

    $subjectFormat = H1 . ' | ' . $subject;

    if (file_exists('../views/mails/' . $templateName . '.php')) {

      include_once '../views/mails/' . $templateName . '.php';

      return mail($to, $subjectFormat, $template, $headers);

    } else {

      return self::displayError(__CLASS__, __FUNCTION__, 'Votre template mail n\'existe pas.');

    }

  }

  /**
  * Fonction traitement post via la global $_POST
  *
  * @param void
  *
  * @return $return string Message de confirmation
  *
  */
  public function contactPost() {

    $response = '';

    // Vérification des champs
    if (!isset($_POST['msg']) || !isset($_POST['rbt'])) $response = "Mais, enfin, cesse de t'amuser avec ton inspecteur.";

    elseif (isset($_COOKIE['message']) && $_POST['msg'] === $_COOKIE['message']) $response = "Vous ne seriez pas en train de me renvoyer exactement le même message ?!";

    elseif (isset($_COOKIE['request'])) $response = "Attendez un petit peu, je crois que je n'ai toujours pas lu votre premier message.";

    elseif (!empty($_POST['rbt'])) $response = "Tu es un robot ? Dommage, j'en suis un aussi.";

    elseif (empty($_POST['msg'])) {

      if (!isset($_COOKIE['empty'])) {

        $response = "Ce message me semble un peu vide pour l'envoyer.";
        setCookie('empty', 1, time()+60);

      } elseif ($_COOKIE['empty'] == 1) {

        $response = "En fait, vous aimez la petite animation.";
        setCookie('empty', 2, time()+60);

      } elseif ($_COOKIE['empty'] == 2) {

        $response = "Bon, là, ça devient inquiétant.";
        setCookie('empty', 3, time()+60);

      } elseif ($_COOKIE['empty'] == 3) {

        $response = "Hmmm...";
        setCookie('empty', 4, time()+60);

      } elseif ($_COOKIE['empty'] == 4) {

        $response = "J'attends votre message moi !";
        setCookie('empty', 4, time()+600);

      }

    } elseif (strlen($_POST['msg']) < 5) {

      $response = "Il est vraiment court ce message, pour la peine je ne l'envoie pas.";
      if (isset($_COOKIE['empty'])) unset($_COOKIE['empty']); setCookie('empty', '', -1);

    } elseif (empty($response)) {

      // Filtre du post 1
      $message = htmlentities($_POST['msg'], ENT_QUOTES);

      // Récupération des mails
      $emails = '';
      foreach (explode(' ', trim($message, "\t\n\r\0\x0B")) as $value) if(filter_var($value, FILTER_VALIDATE_EMAIL)) $emails .= $value . ', ';

      if (self::sendMail($emails, 'Contact', $message)) {

        $response = "Nickel, ton message a bien été envoyé !";
        setCookie('message', $message, time()+3600); // Expire 1 heure
        setCookie('request', TRUE, time()+60); // Expire 1 minute
        if (isset($_COOKIE['empty'])) unset($_COOKIE['empty']); setCookie('empty', '', -1);

      } else $response = "Mince, il ya eu comme un problème lorsque j'ai voulu envoyer ton message.";

    }

    return $response;

  }

}
