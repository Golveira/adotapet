<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <x-sidebar-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                    <x-icons.chart-pie />
                    <span class="ml-3">Dashboard</span>
                </x-sidebar-link>
            </li>

            <li>
                <x-sidebar-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                    <x-icons.users />
                    <span class="ml-3">{{ __('Users') }}</span>
                </x-sidebar-link>
            </li>

            <li>
                <x-sidebar-link href="{{ route('admin.pets.index') }}" :active="request()->routeIs('admin.pets.index')">
                    <x-icons.paw />
                    <span class="ml-3">Pets</span>
                </x-sidebar-link>
            </li>
        </ul>
    </div>
</aside>
