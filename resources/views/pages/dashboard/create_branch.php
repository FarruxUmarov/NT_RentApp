<?php

declare(strict_types=1);
viewPartials('header');
viewPartials('navbar');
/**
 * @var $ad
 * @var $branch
 * @var $statuses
 */


?>
<section class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('../../assets/images/01.jpg')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
            <div class="relative overflow-hidden bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                <div class="p-6">
                    <a href="">
                        <img src="assets/images/logo-dark.png" class="mx-auto block dark:hidden" alt="">
                        <img src="assets/images/logo-light.png" class="mx-auto dark:block hidden" alt="">
                    </a>
                    <form class="text-start" action="" method="post">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="branch">Branch:</label>
                                <input id="branch" name="name" type="text" class="form-input mt-3" placeholder="branch:" required>
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="address">Address:</label>
                                <input id="address" name="address" type="text" class="form-input mt-3" placeholder="address" required>
                            </div>
                            <div class="mb-4">
                                <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">Saqlash</button>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="px-6 py-2 bg-slate-50 dark:bg-slate-800 text-center">
                    <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script>2024 Hously. Designed by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
viewPartials(path: 'footer', loadFromPublic: false);
?>
