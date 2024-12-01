<?php
  require '../vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  function sendEmail($client_email, $requested_document) {
    $mail = new PHPMailer(true);

    try {
      // Set up PHPMailer
      $mail -> isSMTP();
      $mail -> Host = 'smtp.gmail.com';
      $mail -> SMTPAuth = true;
      $mail -> Username = 'bokwebmaster2000@gmail.com'; // Your Gmail address
      $mail -> Password = 'qxepkpgupfksvpfx'; // Your Gmail App Password
      $mail -> SMTPSecure = 'ssl';
      $mail -> Port = 465;
  
      $mail -> setFrom('bokwebmaster2000@gmail.com', 'BPC Registrar');
      
      $mail->addAddress($client_email);

      // Email content
      $mail -> isHTML(true);
      $mail -> Subject = 'Request for ' . $requested_document;
      $mail -> Body = '
        <p>Dear Recipient,</p>
        <p>Thank you for your request for ' . htmlspecialchars($requested_document) . '.</p>
        <p>Please be informed that it will take approximately 3-5 business days for the registrar to process and accomplish your request.</p>
        <p>We appreciate your patience and understanding.</p>
        <p>Best regards,<br>BPC Registrar</p>
      ';

      // Send the email
      $mail -> send();
      return true;
    } catch (Exception $e) {
      exit();
    }
  }
?>