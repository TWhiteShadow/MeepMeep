<?php

namespace App\Event;

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();

        // Configurer les paramètres SMTP selon votre besoin
        $this->mailer->Host = 'mailcatcher';
        $this->mailer->Port = 1025;

        $this->mailer->setFrom('sender@meepmeep.com', 'Sender');
    }

    public function sendCreateEmail($recipient, $data)
    {
        $this->mailer->addAddress($recipient);

        $subject = 'New Record Created';
        $body = "<h1>New Record Created</h1>
            <p>Data: " . json_encode($data) . "</p>";

        $this->sendEmail($subject, $body);
    }

    public function sendUpdateEmail($recipient, $data)
    {
        $this->mailer->addAddress($recipient);

        $subject = 'Record Updated';
        $title = "<h1>Record Updated</h1>";
        $body = $this->formatEmail($title, $data);
        $this->sendEmail($subject, $body);
    }

    public function sendDeleteEmail($recipient, $data)
    {
        $this->mailer->addAddress($recipient);

        $subject = 'Record Deleted';
        $body = "<h1>Record Deleted</h1>
            <p>Data: " . json_encode($data) . "</p>";

        $this->sendEmail($subject, $body);
    }

    private function sendEmail($subject, $body)
    {
        $this->mailer->Subject = $subject;
        $this->mailer->isHTML(true);
        $this->mailer->Body = $body;

        if ($this->mailer->send()) {
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
        }

        // Réinitialiser les destinataires pour les prochains envois
        $this->mailer->clearAddresses();
    }

    private function formatEmail($title, $data) {
        // Decode the JSON data
        $data = json_decode($data, true);
    
        // Start building the HTML body
        $body = '<html lang="en">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta name="viewport" content="width=device-width">
              <title>' . $title . '</title>
              <style></style>
            </head>
            <body>
               <div id="email" style="width:600px;">
            
                <table role="presentation" border="0" cellspacing="0" width="100%">
                  <tr>
                    <td>' . $title . '</td>
                  </tr>
                </table>';
    
        // Loop through the data to create rows in the table
        foreach ($data as $key => $value) {
            if ($key == "photo"){
                $body.= '<table role="presentation" border="0" cellspacing="0" width="100%">
                  <tr>
                    <td><strong>Photo&nbsp;:</strong></td>
                    <td><img src="'. $value. '" height="300px"></td>
                  </tr>
                </table>';
            }else{
                $body .= '<table role="presentation" border="0" cellspacing="0" width="100%">
                <tr>
                <td><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</td>
                </tr>
                </table>';
            }
        }
    
        // Close the HTML body
        $body .= '</div></body></html>';
    
        // Return the formatted email body
        return $body;
    }
}
