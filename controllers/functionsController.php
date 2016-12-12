<?php

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
  * Fonction d'envoie de mail
  *
  * @param (string) $to
  * @param (string) $subject
  * @param (string) $content
  * @param (string) $from (option)
  *
  */
  public function sendMail($to, $subject, $content, $from = EMAIL) {

    $headers = 'Content-Type: text/html; charset=\"UTF-8\";' . "\r\n";
    $headers .= 'FROM: Roman Czerkies <' . $from . '>' . "\r\n";

    $subjectFormat = "Roman Czerkies - " . $subject;

    mail($to, $subjectFormat, $content, $headers);

  }

  /**
  * Fonction traitement post
  *
  *
  */
  public function contactPost() {

    if(!empty($_POST[1]) && empty($_POST[2])) {

      $message = htmlentities($_POST[1], ENT_QUOTES);

      $words = explode(' ', trim($message, "\t\n\r\0\x0B"));
      /*echo "<pre>";
      var_dump($words);*/

      $emails = [];
      $urls = [];

      foreach ($words as $value) {

        if(filter_var($value, FILTER_VALIDATE_EMAIL)) $emails[] = $value;
        if(filter_var($value, FILTER_VALIDATE_URL)) $urls[] = $value;

      }

      //$return = array_key_exists($message, $datas) ? $datas[$message] : "Votre message a bien été envoyé."; // @TODO uppercase
      $return = "Votre message a bien été envoyé.";

    } else {

      $return = "Votre message n'a pas été envoyé.";

    }

    return $return;

  }

}
