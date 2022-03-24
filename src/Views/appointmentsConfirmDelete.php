<?php require_once('src\Views\Components\layout.php'); ?>

<main class="p-5 min-h-screen">
    <div class="flex flex-col gap-5 sm:mt-20 text-center">
        <h2 class="text-xl font-bold">This change can't be undone.</h2>
        <p>Are you sure you want to delete the appointment: <span class="font-bold"><?php echo $data['appointment']->getName() ?></span>?</p>
        <div class="flex justify-center gap-5 mt-5">
            <a class="border-2 border-gray-200 hover:shadow-gray-200/40 hover:bg-gray-200 py-2 px-4 rounded-lg justify-self-end" href="./">
                Cancel
            </a>
            <a class="border-2 border-[#f79f79] hover:shadow-[#f79f79]/40 bg-[#f79f79] py-2 px-4 rounded-lg justify-self-start" href="?action=delete&id=<?php echo $data["appointment"]->getId(); ?>">
                Delete
            </a>
        </div>
    </div>
    
</main>

<?php require_once('src\Views\Components\footer.php'); ?>