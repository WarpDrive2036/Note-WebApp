<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
       <?php foreach ($notes as $note) : ?>

           <li>
          <a href="/note?id=<?=$note['id']?>" class="text-blue-500 hover:underline">

              <!-- Don't just blindly echo out what the user inputted-->
              <!--  So this wrapped function "htmlspecialchars"
              blocks the effect of any HTML/php/JS syntax if entered by the user on the page -->
              <?= htmlspecialchars($note['body'])  ?>
          </a>
           </li>

        <?php endforeach; ?>

        <ul>
            <p class="mt-6">

                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>

            </p>
        </ul>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
