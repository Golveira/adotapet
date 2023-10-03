<aside
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-14 transition-transform dark:border-gray-700 dark:bg-gray-800 md:translate-x-0"
    id="drawer-navigation" aria-label="Sidenav">
    <div class="h-full overflow-y-auto bg-white px-3 py-5 dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <x-links.sidebar-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                    <x-icons.chart-pie />
                    <span class="ml-3">Dashboard</span>
                </x-links.sidebar-link>
            </li>

            <li>
                <x-links.sidebar-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                    <x-icons.users />
                    <span class="ml-3">{{ __('Users') }}</span>
                </x-links.sidebar-link>
            </li>

            <li>
                <x-links.sidebar-link :href="route('admin.pets.index')" :active="request()->routeIs('admin.pets.index')">
                    <x-icons.paw />
                    <span class="ml-3">{{ __('Pets') }}</span>
                </x-links.sidebar-link>
            </li>
        </ul>
    </div>
</aside>
