<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5">
    <form action="?action=store" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" class="form-control" id="species" name="species" placeholder="Species">
        </div>
        <div class="form-group">
            <label for="breed">Breed</label>
            <input type="text" class="form-control" id="breed" name="breed" placeholder="Breed">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" placeholder="Time">
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="person">Person</label>
            <input type="text" class="form-control" id="person" name="person" placeholder="Person">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <label for="mail">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>

<?php require_once('src\Views\Components\footer.php'); ?>