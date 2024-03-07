<?php
namespace App\Event;
class EmailListener {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function onCarCreated($car) {
        // Send email
        $this->email->sendCreateEmail("receiver@example.com", $car);
    }

    public function onCarUpdated($car) {
        // Send email
        $this->email->sendUpdateEmail("receiver@example.com", $car);
    }
    public function onCarDeleted($car) {
        // Send email
        $this->email->sendDeleteEmail("receiver@example.com", $car);
    }
}