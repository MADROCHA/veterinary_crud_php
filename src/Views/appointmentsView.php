<?php require_once('src\Views\Components\layout.php') ?>
<main>
    <h1>Hola</h1>
    <?php
        foreach ($data["appointments"] as $appointment) {
            // print id, name, species, breed, date, time, reason, description, person, phone, mail, created_at, updated_at
            echo <<<TAG
                <div class="appointment">
                    <h2 class="text-4xl">{$appointment->getName()}</h2>
                    <p>{$appointment->getSpecies()}</p>
                    <p>{$appointment->getBreed()}</p>
                    <p>{$appointment->getDate()}</p>
                    <p>{$appointment->getTime()}</p>
                    <p>{$appointment->getReason()}</p>
                    <p>{$appointment->getDescription()}</p>
                    <p>{$appointment->getPerson()}</p>
                    <p>{$appointment->getPhone()}</p>
                    <p>{$appointment->getMail()}</p>
                    <p>{$appointment->getCreatedAt()}</p>
                    <p>{$appointment->getUpdatedAt()}</p>
                </div>
            TAG;
            // echo "<div class='appointment'>";
            // echo "<h2>{$appointment->getName()}</h2>";
        }
    ?>
</main>

<?php require_once('src\Views\Components\footer.php') ?>