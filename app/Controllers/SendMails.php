<?php namespace Controllers;

use Flight;
use PHPMailer;
use Valitron\Validator;
use Joelvardy\Flash;
use Models\Message;

class SendMails {

  public static function contact() {
    $data = [
      'name' => Flight::request()->data->name,
      'message' => Flight::request()->data->message,
    ];

    $v = new Validator($data);
    $v->rule('required', ['name', 'message'])->message('Este campo no puede estar vacío.');
    $v->rule('lengthMin', 'name', 2)->message("El nombre tiene que tener más de 2 caracteres.");
    $v->rule('lengthMin', 'message', 4)->message("El mensaje tiene que tener más de 4 caracteres.");

    if (!$v->validate()) {
      Flash::data(array_merge($data, ['errors' => $v->errors()]));
      Flight::redirect('/contacto');
    }

    $mail = SendMails::phpMailerBase();

    // $mail->setFrom('email', 'name');
    $mail->addAddress(getenv('CONTACT_EMAIL'), getenv('CONTACT_NAME'));
    $mail->Subject = 'Subject';

    $mail->IsHTML(true);
    $mail->Body = SendMails::getEmailTemplate('mail', $data);

    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      // Message sent!
      if (getenv('DB_STATUS') != 'disabled') {
        // store in DB
        Message::create(['name' => $data['name'], 'message' => $data['message']]);
      }

      Flight::redirect('/contacto/gracias');
    }
  }

  public static function getEmailTemplate($email_file, $data) {
    ob_start();
    Flight::render("emails/{$email_file}", $data);
    return ob_get_clean();
  }

  public static function phpMailerBase() {
    $phpMailer = new PHPMailer;
    return $phpMailer;
  }

  public static function phpMailerWithSMTP() {
    $phpMailer = new PHPMailer;
    $phpMailer->isSMTP();
    $phpMailer->Host = 'localhost';
    $phpMailer->Username = 'user@server.com';
    $phpMailer->Password = 'password';
    $phpMailer->Port = 25;
    $phpMailer->SMTPAuth = true;
    $phpMailer->SMTPSecure = 'tls';
    // $phpMailer->SMTPDebug = 3;
    $phpMailer->CharSet = 'UTF-8';
    return $phpMailer;
  }

  public static function phpMailerWithSendmail() {
    $phpMailer = new PHPMailer;
    $phpMailer->IsSendmail();
    $phpMailer->CharSet = 'UTF-8';
    return $phpMailer;
  }

}
