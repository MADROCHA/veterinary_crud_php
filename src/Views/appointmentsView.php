<?php require_once('src\Views\Components\layout.php'); ?>
<main class="p-5 min-h-screen">
    <h1 class="text-xl font-bold uppercase text-center">Citas animalillos</h1>
    <div class="grid gap-4 justify-around my-5 lg:grid-cols-2">
        <?php
            $editIcon = 'assets\svg\edit.svg';
            $deleteIcon = 'assets\svg\trash.svg';
            foreach ($data["appointments"] as $appointment) {
                $printBreed = "";
                $color = "";
                if ($appointment->getBreed() != "") {
                    $printBreed = " - <span>{$appointment->getBreed()}</span>";
                }
                
                if ($appointment->getSpecies() == "dog") {
                    $color = "[#f7d08a]";
                }
                if ($appointment->getSpecies() == "cat") {
                    $color = "[#f79f79]";
                }
                if ($appointment->getSpecies() == "reptile") {
                    $color = "[#87b6a7]";
                }
                if ($appointment->getSpecies() == "bird") {
                    $color = "[#c7aaec]";
                }
                if ($appointment->getSpecies() == "unicorn") {
                    $color = "[#afc2d5]";
                }
                // print id, name, species, breed, date, time, reason, description, person, phone, mail, created_at, updated_at
                echo <<<TAG
                  <div class="border-2 border-{$color} max-w-2xl rounded-3xl overflow-hidden px-6 py-4 hover:shadow-lg hover:shadow-{$color}/40 place-self-stretch">
                  <div class="flex justify-between gap-2 sm:gap-4">
                    <div class="bg-{$color} -mt-4 -ml-6 px-6 py-4 rounded-br-3xl flex-1">
                      <h2 class="text-4xl font-black">{$appointment->getName()}</h2>
                      <p class="text-lg">
                        <span>{$appointment->getSpecies()}</span>
                        {$printBreed}
                      </p>
                    </div>
                    <div class="flex flex-col items-end text-sm flex-1">
                      <h4 class="text-lg">Cita</h4>
                      <p>{$appointment->getDate()}</p>
                      <p>{$appointment->getTime()}</p>
                    </div>
                    <div class="-mt-4 -mr-6 w-12 rounded-bl-xl flex flex-col justify-between border-l-2 border-b-2 border-{$color} overflow-hidden">
                      <a class="flex place-items-center justify-center flex-1 hover:bg-{$color} hover:cursor-pointer border-b-2 border-{$color}" href='?action=confirmDelete&id={$appointment->getId()}'>
                          <img class="w-6" src="{$deleteIcon}" alt="delete">
                      </a>
                      <a class="flex place-items-center justify-center flex-1 hover:bg-{$color} hover:cursor-pointer" href='?action=edit&id={$appointment->getId()}'>
                          <img class="w-5" src="{$editIcon}" alt="Editar">
                      </a>
                    </div>
                  </div>
                  <div class="my-2">
                    <h3 class="text-xl font-black">{$appointment->getReason()}</h3>
                    <p class="">
                      {$appointment->getDescription()}
                    </p>
                  </div>
                  <div class="text-gray-500">
                    <p>Demanada: {$appointment->getCreatedAt()}</p>
                  </div>
                  <div class="flex flex-col justify-between text-gray-500 sm:flex-row mt-2 gap-x-8">
                    <p>{$appointment->getPerson()}</p>
                    <p>{$appointment->getPhone()}</p>
                    <p>{$appointment->getMail()}</p>
                  </div>
                  </div>
                TAG;
            }
        ?>
    </div>
    <div class="fixed bottom-8 right-5">
        <a class="border-2 border-[#c5d668] hover:shadow-[#c5d668]/40 bg-[#c5d668] py-2 px-4 rounded-lg" href="?action=create" href='?action=create'>New appointment</a>
    </div>
</main>

<?php require_once('src\Views\Components\footer.php'); ?>