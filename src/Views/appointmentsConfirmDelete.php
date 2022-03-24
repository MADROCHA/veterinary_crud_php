<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5 min-h-screen">
    <h2 class="text-xl font-bold">You won't undone this change</h2>
    <p>Are you sure you want to delete appointment of: <span class="font-bold"><?php echo $data['appointment']->getName() ?></span>?</p>
    <div class="flex justify-around">
        <a class="border-2 border-gray-200 hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg" href="./">
            Cancel
        </a>
        <a class="border-2 border-[#f79f79] hover:shadow-[#f79f79]/40 bg-[#f79f79] py-2 px-4 rounded-lg" href="?action=delete&id=<?php echo $data["appointment"]->getId(); ?>">
            Delete
        </a>
    </div>
    
</main>

<?php require_once('src\Views\Components\footer.php'); ?>