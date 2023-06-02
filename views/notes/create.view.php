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
            <form method="post" action="/notes">
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>



                <div class="col-span-full">
                    <div class="mt-2">
                        <!-- using "required in textarea isn't enough a user can easily bypass this by using this command in the
                        terminal curl -X POST http://localhost:port/notes/create -d 'body='"-->

                        <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                            <?= isset($_POST['body'])? $_POST['body']:''; ?>
                        </textarea>
                       <!-- php script that gives feedback to the user when the
                       body is empty & he/she clicked save button -->
                        <?php if(isset($errors['body'])) :?>
                            <p class="text-red-500 text-xs mt-2"><?=$errors['body']?></p>
                        <?php endif;?>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a new Note Idea!....</p>
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

<?php require base_path('views/partials/footer.php') ?>