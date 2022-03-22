<?php require_once('src\Views\Components\layout.php') ?>
<main class="p-5">
    <h1>Citas animalillos</h1>
    <?php
        foreach ($data["appointments"] as $appointment) {
            // print id, name, species, breed, date, time, reason, description, person, phone, mail, created_at, updated_at
            echo <<<TAG
              <div class="border-2 border-sky-400 max-w-2xl mx-auto my-16 rounded-3xl overflow-hidden px-6 py-4 hover:shadow-lg hover:shadow-sky-400/40">
              <div class="flex justify-between">
                <div class="bg-sky-400 -mt-4 -ml-6 px-6 py-4 rounded-br-3xl flex-1">
                  <h2 class="text-4xl font-black">Muxi</h2>
                  <p class="text-lg">
                    <span>{$appointment->getName()}</span>
                    - 
                    <span>{$appointment->getBreed()}</span>
                  </p>
                </div>
                <div class="flex flex-col items-end text-sm flex-1">
                  <h4 class="text-lg">Cita</h4>
                  <p>{$appointment->getDate()}</p>
                  <p>{$appointment->getTime()}</p>
                </div>
              </div>
              <div class="my-2">
                <h3 class="text-xl font-black">{$appointment->getReason()}</h3>
                <p class="hidden">
                  {$appointment->getDescription()}
                </p>
              </div>
              <div class="text-gray-500">
                <p>Demanada: {$appointment->getCreatedAt()}</p>
              </div>
              <div class="flex flex-col justify-between text-gray-500 sm:flex-row mt-2">
                <p>{$appointment->getPerson()}</p>
                <p>{$appointment->getPhone()}</p>
                <p>{$appointment->getMail()}</p>
              </div>
              </div>
            TAG;
        }
    ?>
</main>

<?php require_once('src\Views\Components\footer.php') ?>