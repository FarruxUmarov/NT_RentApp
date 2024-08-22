<?php

viewPartials("header");
viewPartials("navbar");


?>

<section class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('../../assets/images/01.jpg')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
            <div class="relative overflow-hidden bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                <div class="p-6">
                    <a href="">
                        <img src="../../assets/images/logo-dark.png" class="mx-auto block dark:hidden" alt="">
                        <img src="../../assets/images/logo-light.png" class="mx-auto dark:block hidden" alt="">
                    </a>
                    <h5 class="my-6 text-xl font-semibold">Login</h5>
                    <form action="" method="post" class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="LoginEmail">Email Address:</label>
                                <input id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com">
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="LoginPassword">Password:</label>
                                <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="Password:">
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Remember me</label>
                                </div>
                                <p class="text-slate-400 mb-0"><a href="reset-password.html" class="text-slate-400">Forgot password ?</a></p>
                            </div>

                            <div class="mb-4">
                                <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Login / Sign in</a>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Don't have an account ?</span> <a href="signup.html" class="text-black dark:text-white font-medium">Sign Up</a>
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

<?php viewPartials("header"); ?>