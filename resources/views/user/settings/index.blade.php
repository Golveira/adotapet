<x-app-layout>
    <div class="mx-auto max-w-6xl space-y-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 px-4 pt-6 dark:bg-gray-900 xl:grid-cols-4 xl:gap-4">
            <div class="col-span-full mb-6 xl:col-auto">
                @include('user.settings.partials.menu')
            </div>

            <div class="col-span-3">
                @include('user.settings.partials.email-verification-message')

                <livewire:avatar-upload />

                @include('user.settings.partials.update-profile-form')

                @include('user.settings.partials.update-password-form')

                @include('user.settings.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
