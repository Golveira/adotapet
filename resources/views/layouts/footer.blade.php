<footer class="sticky top-[100vh] bg-gray-100 p-4 dark:bg-gray-800 sm:p-6">
    <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between">
            <!-- Logo -->
            <a class="mb-10 block" href="{{ route('welcome') }}">
                <x-application-logo />
            </a>

            <!-- Links -->
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-6">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                        Pets
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('pets.index') }}">
                                {{ __('Adopt a pet') }}
                            </a>
                        </li>

                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('pets.create') }}">
                                {{ __('Promote a pet') }}
                            </a>
                        </li>

                        <li>
                            <a class="hover:underline" href="#">
                                {{ __('Make a donation') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                        {{ __('Profile') }}
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            @auth
                                <a class="hover:underline" href="{{ route('profile.show', Auth::user()->username) }}">
                                    {{ __('My Profile') }}
                                </a>
                            @endauth
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('login') }}">
                                {{ __('Log in') }}
                            </a>
                        </li>
                        <li>
                            <a class="hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                        {{ __('Adotapet') }}
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="#">
                                {{ __('About us') }}
                            </a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="#">
                                {{ __('Privacy Policy') }}
                            </a>
                        </li>
                        <li>
                            <a class="hover:underline" href="#">
                                {{ __('Terms and Conditions') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-8" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <!-- Copyright -->
            <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">
                © 2023 <a href="#"class="hover:underline">
                    {{ __('Adotapet') }}
                </a>.
                {{ __('All rights reserved.') }}
            </span>

            <!-- Social media -->
            <div class="mt-4 flex space-x-6 sm:mt-0 sm:justify-center">
                <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" href="#">
                    <x-icons.facebook />
                </a>

                <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" href="#">
                    <x-icons.instagram />
                </a>

                <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" href="#">
                    <x-icons.twitter />
                </a>
            </div>
        </div>
    </div>
</footer>
