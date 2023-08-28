<div class="col-span-full xl:col-auto mb-6">
    <div
        class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <x-list-group-link :href="route('settings.profile.edit')" :active="request()->routeIs('settings.profile.edit')">
            {{ __('Profile') }}
        </x-list-group-link>

        <x-list-group-link :href="route('settings.email.edit')" :active="request()->routeIs('settings.email.edit')">
            {{ __('Email') }}
        </x-list-group-link>

        <x-list-group-link :href="route('settings.password.edit')" :active="request()->routeIs('settings.password.edit')">
            {{ __('Password') }}
        </x-list-group-link>

        <x-list-group-link href="#">
            {{ __('Notifications') }}
        </x-list-group-link>
    </div>
</div>
