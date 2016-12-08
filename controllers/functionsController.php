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
      if ($attr) foreach ($attr as $key => $value) $field .= ' ' . $key . '="' . $value . '"';
      if ($_POST && isset($_POST[$name])) $field .= ' value="' . $_POST[$name] . '"';
      elseif ($value) $field .=  ' value="' . $value . '"';
      if ($required) $field .= ' required';
      $field .= ">\n";

    } else {

      $field .= 'Attribuez un nom à votre champs.';

    }

    echo $field;

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
  public function fieldsFormTextarea($name = '', $id = FALSE, $required = FALSE, $value = '', $attr = array()) {

    $field = '';

    $field .= '<textarea name="' . $name . '"';
    if ($id) $field .= ' id="' . $name . '"';
    if ($attr) foreach ($attr as $key => $value) $field .= ' ' . $key . '="' . $value . '"';
    if ($required) $field .= ' required';
    $field .= '>';
    if ($_POST && $_POST[$name]) $field .= $_POST[$name];
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
  public function sendMail($to, $subject, $content, $from = EMAIL){

    $headers = 'Content-Type: text/html; charset=\"UTF-8\";' . "\r\n";
    $headers .= 'FROM: Le petit St Bernard <' . $from . '>' . "\r\n";

    $subjectFormat = "Le petit St bernard - " . $subject;

    mail($to, $subjectFormat, $content, $headers);

  }

}
