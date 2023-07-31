<footer class="p-4 bg-gray-100 sm:p-6 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between">
            <!-- Logo -->
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <x-application-logo />
                </a>
            </div>

            <!-- Links -->
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Pets') }}
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="{{ route('pets.index') }}" class="hover:underline">
                                {{ __('Adopt a pet') }}
                            </a>
                        </li>

                        <li class="mb-4">
                            <a href="{{ route('pets.create') }}" class="hover:underline">
                                {{ __('Promote a pet') }}
                            </a>
                        </li>

                        <li>
                            <a href="#" class="hover:underline">
                                {{ __('Make a donation') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Profile') }}
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            @auth
                                <a href="{{ route('profile.show', Auth::user()->username) }}" class="hover:underline ">
                                    {{ __('My Profile') }}
                                </a>
                            @endauth
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('login') }}" class="hover:underline">
                                {{ __('Log in') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="hover:underline">
                                {{ __('Register') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Adotapet') }}
                    </h2>

                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">
                                {{ __('About us') }}
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">
                                {{ __('Privacy Policy') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                {{ __('Terms and Conditions') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <!-- Copyright -->
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                © 2023 <a href="#"class="hover:underline">
                    {{ __('Adotapet') }}
                </a>.
                {{ __('All rights reserved.') }}
            </span>

            <!-- Social media -->
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <x-icons.facebook />
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <x-icons.instagram />
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <x-icons.twitter />
                </a>
            </div>
        </div>
    </div>
</footer>
