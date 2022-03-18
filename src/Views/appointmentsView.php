<?php require_once('src\Views\Components\layout.php') ?>
<main>
    <h1>Hola</h1>
    <?php
        foreach ($data["appointments"] as $appointment) {
            echo "<p>{$appointment->getName()}</p>";
        }
    ?>
</main>

<?php require_once('src\Views\Components\footer.php') ?>