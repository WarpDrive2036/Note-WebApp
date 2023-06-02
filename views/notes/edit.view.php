<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <!--
        FORM WITH NO Style--------

        <form method="post">-->
    <!--                <label for="body">Description</label>-->
    <!--                <div>-->
    <!--                <textarea id="body" name="body"> </textarea>-->
    <!--                </div>-->
    <!--                <p>-->
    <!--                    <button type="submit">Create</button>-->
    <!--                </p>-->
    <!--            </form>-->
    <!--        </div>-->
    <!--    </main>-->


    <!-- FORM With Style  -->

    <!--            <form method="post">-->
    <!--                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>-->
    <!---->
    <!--                <div class="col-span-full">-->
    <!--                    <div class="mt-2">-->
    <!--                        <textarea id="title" name="title" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>-->
    <!---->
    <!--                        <div class="mt-6 flex items-center justify-end gap-x-6">-->
    <!--                    <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>-->
    <!--                </div>-->
    <!--            </form>-->


    <!-- The "POST" method that we directed the form to do (changes the state of the browser from _GET to
   _POST & then listens to whatever is written in the form) -->
    <form method="post" action="/note">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?=$note['id']?>">
        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>

        <div class="col-span-full">
            <div class="mt-2">
                <!-- using "required in textarea isn't enough a user can easily bypass this by using this command in the
                terminal curl -X POST http://localhost:port/notes/create -d 'body='"-->

                <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                            <?= $note['body'];?>
                        </textarea>
                <!-- php script that gives feedback to the user when the
                body is empty & he/she clicked save button -->
                <?php if(isset($errors['body'])) :?>
                    <p class="text-red-500 text-xs mt-2"><?=$errors['body']?></p>
                <?php endif;?>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a new Note Idea!....</p>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6 flex gap-x-4 justify-end">

            <a href="/notes"

                type="submit" class="rounded-md bg-gray-500 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                Cancel

            </a>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                Update

            </button>
        </div>
    </form>


    <form method="post" action="/note">
        <div class="mt-6 flex items-center justify-end gap-x-6">
                <input type="hidden" name="_method" value="DELETE"> <!-- a hidden variable with a given value
            to be used to detect the type custom Request through the POST['_method'] method already in the form-->
                <input type="hidden" name="id" value="<?= $note['id'] ?>"> <!-- when the form "POST" method is detected
            a hidden dynamic variable will be able to be referenced (note['id'])-->
                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                    Delete

                </button>
            </div>
    </form>


<?php require base_path('views/partials/footer.php') ?>