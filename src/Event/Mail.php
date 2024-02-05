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

        $this->mailer->setFrom('ououibaguette@gmail.com', 'Mailtrap');
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
        $body = "<h1>Record Updated</h1>
            <p>Data: " . json_encode($data) . "</p>";

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
}
