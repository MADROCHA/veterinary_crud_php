<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Appointment;

class AppointmentsController {
    public function __construct() {
        $this->index();   
    }
    
    public function index() {
        $appointment = new Appointment;
        $appointments = $appointment->all();

        new View("appointmentsView", ["appointment" => $appointments]);
    }
}

?>      