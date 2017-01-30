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

    $mail = new PHPMailer;

    /*
    // SMTP
    $mail->isSMTP();
    $mail->Host = 'host.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'user@server.com';
    $mail->Password = 'password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;
    // $mail->SMTPDebug = 1;
    */

    // $mail->setFrom('email', 'name');
    $mail->addAddress(getenv('CONTACT_EMAIL'), getenv('CONTACT_NAME'));
    $mail->Subject = 'Subject';

    $mail->IsHTML(true);
    $mail->Body = "<h1>Email from website</h1>"
                . "<p><b>Name:</b> {$data['name']}</p>"
                . "<p><b>Message:</b> {$data['message']}</p>";

    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
      // Message sent!
      if (getenv('DB_STATUS') != 'disabled') {
        Message::create(['name' => $data['name'], 'message' => $data['message']]);
      }

      Flight::redirect('/contacto/gracias');
    }
  }

}
