<?php

namespace App\Controllers;

use App\Models\Appointment;

class AppointmentsController {
    public function __construct() {
        $this->index();   
    }
    
    public function index() {
        $appointment = new Appointment;
        $appointments = $appointment->all();
    }
}

?>      