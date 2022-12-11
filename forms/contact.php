<?php
  /**
  * Requires the "PHP Email Form" library
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  // Substitua contact@example.com pelo seu endereço de e-mail de recebimento real
  $receiving_email_address = 'nadoserafim@hotmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Não foi possível carregar a biblioteca "Formulário de e-mail PHP"!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Descomente o código abaixo se quiser usar o SMTP para enviar e-mails. Você precisa inserir suas credenciais SMTP corretas
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
