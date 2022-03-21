<?php require_once('src\Views\Components\layout.php') ?>
<main>
    <h1>Hola</h1>
    <?php
        foreach ($data["appointments"] as $appointment) {
            echo <<<TAG
            <p class="bg-pink-500">{$appointment->getName()}</p>
            <p>{$appointment->getSpecies()}</p>
            <p>{$appointment->getDate()}</p>
            <p>{$appointment->getBreed()}</p>
            <p>{$appointment->getName()}</p>
            
            TAG;

        }
    ?>
</main>

<?php require_once('src\Views\Components\footer.php') ?>