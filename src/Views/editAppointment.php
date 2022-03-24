<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5 min-h-screen">
    <form action="?action=update&id=<?php echo $data["appointment"]->getId() ?>" method="POST" class="flex flex-col gap-5">
        <div class="grid grid-cols-3">
            <div class="col-span-1 flex flex-col gap-2">
                <label for="name">Name</label>
                <label for="species">Species</label>
                <label for="breed">Breed</label>
                <label for="date">Date</label>
                <label for="time">Time</label>
                <label for="reason">Reason</label>
                <label for="description">Description</label>
                <label for="person">Person</label>
                <label for="phone">Phone</label>
                <label for="mail">Mail</label>
            </div>
            <div class="col-span-2 flex flex-col gap-2">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $data['appointment']->getName() ?>" required>
                <input type="text" class="form-control" id="species" name="species" placeholder="Species" value="<?php echo $data['appointment']->getSpecies() ?>" required>
                <input type="text" class="form-control" id="breed" name="breed" placeholder="Breed" value="<?php echo $data['appointment']->getBreed() ?>">
                <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $data['appointment']->getDate() ?>" required>
                <input type="time" class="form-control" id="time" name="time" placeholder="Time" value="<?php echo $data['appointment']->getTime() ?>" required>
                <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason" value="<?php echo $data['appointment']->getReason() ?>" required>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $data['appointment']->getDescription() ?>">
                <input type="text" class="form-control" id="person" name="person" placeholder="Person" value="<?php echo $data['appointment']->getPerson() ?>" required>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $data['appointment']->getPhone() ?>" required>
                <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail" value="<?php echo $data['appointment']->getMail() ?>" required>
            </div>
        </div>
        <div class="flex w-full gap-4 flex-col sm:flex-row">
            <div class="flex flex-1 gap-4">
                <a class="border-2 border-gray-200 block hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg flex-1 text-center" href="./">
                    Cancel
                </a>
                <button type="reset" class="border-2 border-gray-200 hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg flex-1">Reset</button>
            </div>
            <button type="submit" class="border-2 border-[#e3f09b] hover:shadow-[#e3f09b]/40 hover:bg-[#e3f09b] py-2 px-4 rounded-lg flex-1">Update</button>
        </div>
    </form>
</main>

<?php require_once('src\Views\Components\footer.php'); ?>