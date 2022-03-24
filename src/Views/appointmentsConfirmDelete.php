<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5 min-h-screen">
    <h2 class="text-xl font-bold">You won't undone this change</h2>
    <p>Are you sure you want to delete appointment of: <span class="font-bold"><?php echo $data['appointment']->getName() ?></span>?</p>
    <div class="flex justify-around">
        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="?action=delete&id=<?php echo $data["appointment"]->getId(); ?>">
            Delete
        </a>
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="?action=list">
            Cancel
        </a>
    </div>
    
</main>

<?php require_once('src\Views\Components\footer.php'); ?>