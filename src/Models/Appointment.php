<?php

namespace App\Models;

use App\Database;

class Appointment {  
    private int $id; 
    private string $name;
    private string $species;
    private string $breed;
    private string $date;
    private string $time;
    private string $reason;
    private string $description;
    private string $person;
    private string $phone;
    private string $mail;
    private string $created_at;
    private string $updated_at;
    
    private $database;
    private $table = 'appointmentsvet';

    public function __constructor(
        int $id = null,
        string $name,
        string $species,
        string $breed,
        string $date,
        string $time,
        string $reason,
        string $description,
        string $person,
        string $phone,
        string $mail,
        string $created_at = "",
        string $updated_at = ""
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->breed = $breed;
        $this->date = $date;
        $this->time = $time;
        $this->reason = $reason;
        $this->description = $description;
        $this->person = $person;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;

        if (!$this->database) {
            $this->database = new Database;
        }
    }

    public function all() {
        $query = $this->database->mysql->query("SELECT * FROM $this->table");
        $appointmentsArray = $query->fetchAll();

        $appointmentsList = [];
        foreach($appointmentsArray as $appointment) {
            $appointmentItem = new Appointment(
                $appointment['id'],
                $appointment['name'],
                $appointment['species'],
                $appointment['breed'],
                $appointment['date'],
                $appointment['time'],
                $appointment['reason'],
                $appointment['description'],
                $appointment['person'],
                $appointment['phone'],
                $appointment['mail'],
                $appointment['created_at'],
                $appointment['updated_at']
            );

            array_push($appointmentsList, $appointmentItem);
        }

        return $appointmentsList;
    }
}

?>