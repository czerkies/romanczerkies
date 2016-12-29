<?php

/**
 * La class functionsController gère les fonctions du site.
 *
 * Génération des champs de formulaire et traintement du contact.
 *
 * @version v10.0.0
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
  * @param $class (option) string
  * @param $input (option) string
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
      if ($attr) foreach ($attr as $key => $value) if(!empty($val)) $field .= ' ' . $key . '="' . $value . '"';
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
  * @param $class (option) string
  * @param $input (option) string
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
  * @param $from string (option) Mail de EMAIL
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

    $returnOK = "Votre message a bien été envoyé.";

    $returnKO = "Votre message n'a pas été envoyé.";

    // Vérification des champs
    if(!empty($_POST[1]) && empty($_POST[2])) {

      $message = htmlentities($_POST[1], ENT_QUOTES);

      $words = explode(' ', trim($message, "\t\n\r\0\x0B"));

      $emails = '';
      $urls = '';

      foreach ($words as $value) {

        if(filter_var($value, FILTER_VALIDATE_EMAIL)) $emails .= $value . ', ';
        if(filter_var($value, FILTER_VALIDATE_URL)) $urls .= $value;

      }

      if (self::sendMail($emails, 'Contact', $message)) return $returnOK;
      else return $returnKO;

    } else {

      return $returnKO;

    }

  }

}
