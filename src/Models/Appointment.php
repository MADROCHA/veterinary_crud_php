<?php

namespace App\Models;

use App\Core\View;
use App\Database;

class Appointment {  
    private ?int $id; 
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

    public function __construct(
        int $id = null,
        string $name = '',
        string $species = '',
        string $breed = '',
        string $date = '',
        string $time = '',
        string $reason = '',
        string $description = '',
        string $person = '',
        string $phone = '',
        string $mail = '',
        string $created_at = '',
        string $updated_at = ''
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
            $this->database = new Database();
        }
    }

    public function all() {
        $query = $this->database->mysql->query("SELECT * FROM {$this->table}");
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

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSpecies() {
        return $this->species;
    }

    function getBreed() {
        return $this->breed;
    }

    function getDate() {
        return $this->date;
    }

    function getTime() {
        return $this->time;
    }

    function getReason() {
        return $this->reason;
    }

    function getDescription() {
        return $this->description;
    }

    function getPerson() {
        return $this->person;
    }

    function getPhone() {
        return $this->phone;
    }

    function getMail() {
        return $this->mail;
    }

    function getCreatedAt() {
        return $this->created_at;
    }

    function getUpdatedAt() {
        return $this->updated_at;
    }

    function findById($id) {
        $query = $this->database->mysql->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        $result = $query->fetchAll();

        return new Appointment(
            $result[0]['id'],
            $result[0]['name'],
            $result[0]['species'],
            $result[0]['breed'],
            $result[0]['date'],
            $result[0]['time'],
            $result[0]['reason'],
            $result[0]['description'],
            $result[0]['person'],
            $result[0]['phone'],
            $result[0]['mail'],
            $result[0]['created_at'],
            $result[0]['updated_at']
        );
    }

    function delete() {
        $this->database->mysql->query("DELETE FROM {$this->table} WHERE id = {$this->id}");
    }

    function save() {
        $this->database->mysql->query("INSERT INTO {$this->table} (`name`, `species`, `breed`, `date`, `time`, `reason`, `description`, `person`, `phone`, `mail`) VALUES ('{$this->name}', '{$this->species}', '{$this->breed}', '{$this->date}', '{$this->time}', '{$this->reason}', '{$this->description}', '{$this->person}', '{$this->phone}', '{$this->mail}');");
    }
}

?>