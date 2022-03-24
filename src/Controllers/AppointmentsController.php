<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Appointment;

class AppointmentsController {
    public function __construct() {
        
        if (isset($_GET['action']) && $_GET['action'] == 'confirmDelete') {
            $this->confirmDelete($_GET["id"]);
            return;
        }

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

        if (isset($_GET['action']) && ($_GET['action'] == 'edit')) {
            $this->edit($_GET["id"]);
            return;
        }

        if (isset($_GET['action']) && ($_GET['action'] == 'update')) {
            $this->update($_POST, $_GET["id"]);
            return;
        }
                
        if (!isset($_GET['action'])) {
            $this->index();
            return;
        }
    }
    
    public function index() {
        $appointment = new Appointment;
        $appointments = $appointment->all();

        new View("appointmentsView", ["appointments" => $appointments]);
    }

    public function confirmDelete($id) {
        $appointmentConfirmDelete = new Appointment();
        $appointment = $appointmentConfirmDelete->findById($id);

        new View("appointmentsConfirmDelete", ['appointment' => $appointment]);
    }

    public function delete($id) {
        $appointmentDelete = new Appointment();
        $appointment = $appointmentDelete->findById($id);
        $appointment->delete();

        header("Location: ./");
    }

    public function create() {
        new View('createAppointment');
    }

    public function store(array $request) {
        // $this->validateForm($request, 'store');
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

        $this->validateForm($newAppointment, 'store');

        // $newAppointment->save();
        // header("Location: ./");
    }

    public function edit($id) {
        $appointmentEdit = new Appointment();
        $appointment = $appointmentEdit->findById($id);

        new View('editAppointment', ['appointment' => $appointment]);
    }

    public function update(array $request, $id) {
        // $this->validateForm($request, 'update', $id);

        $appointmentUpdate = new Appointment();
        $appointment = $appointmentUpdate->findById($id);

        $appointment->rename(
            $request['name'],
            $request['species'],
            $request['breed'],
            $request['date'],
            $request['time'],
            $request['reason'],
            $request['description'],
            $request['person'],
            $request['phone'],
            $request['mail']
        );

        $this->validateForm($appointment, 'update');

        // $appointment->update();
        // header("Location: ./");
    }

    /* public function validateForm(array $request, $action, $id = null) {
        $errors = [];

        $this->validateText($request['name'], 'name', $errors);
        $this->validateSpecies($request['species'], $errors);
        $this->validateText($request['breed'], 'breed', $errors);
        $this->validateDate($request['date'], $errors);
        $this->validateTime($request['time'], $errors);
        $this->validateReason($request['reason'], $errors);
        $this->validateText($request['person'], 'person', $errors);
        $this->validatePhone($request['phone'], $errors);
        $this->validateMail($request['mail'], $errors);
        
        if ($errors != [] && $action == 'store') {
            new View('createAppointment', ['errors' => $errors]);
        }
        if ($errors != [] && $action == 'update') {
            new View('editAppointment', ['errors' => $errors, 'appointment' => $request]);
        }

        if ($errors == [] && $action == 'store') {
            $this->store($request);
        }
        if ($errors == [] && $action == 'update') {
            $this->update($request, $id);
        }
    } */

    public function validateForm($validation, $action) {
        $errors = [];

        $this->validateText($validation->name, 'name', $errors);
        $this->validateSpecies($validation->species, $errors);
        $this->validateText($validation->breed, 'breed', $errors);
        $this->validateDate($validation->date, $errors);
        $this->validateTime($validation->time, $errors);
        $this->validateReason($validation->reason, $errors);
        $this->validateText($validation->person, 'person', $errors);
        $this->validatePhone($validation->phone, $errors);
        $this->validateMail($validation->mail, $errors);
        
        if ($errors != [] && $action == 'store') {
            new View('createAppointment', ['errors' => $errors]);
        }
        if ($errors != [] && $action == 'update') {
            new View('editAppointment', ['errors' => $errors, 'appointment' => $validation]);
        }

        if ($errors == [] && $action == 'store') {
            $validation->save();
        }
        if ($errors == [] && $action == 'update') {
            $validation->update();
        }

        if ($errors == []) {
            header("Location: ./");
        }
    }

    public function validateText($request, $text, $errors) {
        if (empty($request)) {
            $errors[$text] = "{$text} is required";
        }
        if (strlen($request) > 255) {
            $errors[$text] = "{$text} must be less than 255 characters";
        }
        return $errors;
    }

    public function validateSpecies($request, $errors) {
        if (empty($request)) {
            $errors['species'] = "Species is required";
        }
        // if select options species value is not Dog, Cat, Reptile, Bird or Unicorn then add error
        if ($request != 'Dog' || $request != 'Cat' || $request != 'Reptile' || $request != 'Bird' || $request != 'Unicorn') {
            $errors['species'] = "Species must be Dog, Cat, Reptile, Bird or Unicorn";
        }
        return $errors;
    }

    public function validateDate($request, $errors) {
        if (empty($request)) {
            $errors['date'] = "Date is required";
        }
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $request)) {
            $errors['date'] = "Date must be YYYY-MM-DD";
        }
        return $errors;
    }

    public function validateTime($request, $errors) {
        if (empty($request)) {
            $errors['time'] = "Time is required";
        }
        if (!preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/", $request)) {
            $errors['time'] = "Time must be HH:MM";
        }
        return $errors;
    }

    public function validateReason($request, $errors) {
        if (empty($request)) {
            $errors['reason'] = "Reason is required";
        }
        // if select options reason value is not Urgency, Vaccine, Rutinary or Others then add error
        if ($request != 'Urgency' || $request != 'Vaccine' || $request != 'Rutinary' || $request != 'Others') {
            $errors['reason'] = "Reason must be Urgency, Vaccine, Rutinary or Others";
        }
        return $errors;
    }

    public function validatePhone($request, $errors) {
        if (empty($request)) {
            $errors['phone'] = "Phone is required";
        }
        if (!preg_match("/^[0-9]{9}$/", $request)) {
            $errors['phone'] = "Phone must be 9 digits";
        }
        return $errors;
    }

    public function validateMail($request, $errors) {
        if (empty($request)) {
            $errors['mail'] = "Mail is required";
        }
        if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $request)) {
            $errors['mail'] = "Mail must be valid";
        }
        return $errors;
    }
}

?>      