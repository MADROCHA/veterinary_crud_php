<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5">
    <form action="?action=store" method="POST" class="flex flex-col gap-5">
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
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                <input type="text" class="form-control" id="species" name="species" placeholder="Species">
                <input type="text" class="form-control" id="breed" name="breed" placeholder="Breed">
                <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason">
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                <input type="text" class="form-control" id="person" name="person" placeholder="Person">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail">
            </div>
        </div>
        <div class="flex w-full gap-4 flex-col sm:flex-row">
            <div class="flex flex-1 gap-4">
                <a class="border-2 border-gray-200 block hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg flex-1 text-center" href="./">
                    Cancel
                </a>
                <button type="reset" class="border-2 border-gray-200 hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg flex-1">Reset</button>
            </div>
            <button type="submit" class="border-2 border-sky-400 hover:shadow-sky-400/40 hover:bg-sky-400 py-2 px-4 rounded-lg flex-1">Create</button>
        </div>
    </form>
</main>

<?php require_once('src\Views\Components\footer.php'); ?>