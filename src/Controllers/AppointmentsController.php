<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Appointment;

class AppointmentsController {
    public function __construct() {
        if (isset($_GET['action']) && ($_GET['action'] == 'delete')) {
            $this->delete($_GET["id"]);
            return;
        }

        if (isset($_GET['action']) && ($_GET['action'] == 'create')) {
            $this->create();
            return;
        }

        if (isset($_GET['action']) && ($_GET['action'] == 'store')) {
            $this->store($_POST);
            return;
        }

        $this->index();   
    }
    
    public function index() {
        $appointment = new Appointment;
        $appointments = $appointment->all();

        new View("appointmentsView", ["appointments" => $appointments]);
    }

    public function delete($id) {
        $appointmentDelete = new Appointment();
        $appointment = $appointmentDelete->findById($id);
        $appointment->delete();

        $this->index();
    }

    function create() {
        new View('createAppointment');
    }

    function store(array $request) {
        $newAppointment = new Appointment(
            null,
            $request['name'],
            $request['species'],
            $request['breed'],
            $request['date'],
            $request['time'],
            $request['reason'],
            $request['description'],
            $request['person'],
            $request['phone'],
            $request['mail'],
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
        );

        $newAppointment->save();
        $this->index();
    }
}

?>      