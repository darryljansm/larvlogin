<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200 h-14 flex items-center shadow-sm px-4">
    <div class="flex justify-between items-center w-full">

        <!-- Left: Sidebar toggle + Brand -->
        <div class="flex items-center gap-3">
            <button id="sidebarToggle" class="text-red-700 focus:outline-none lg:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <a href="#" class="text-lg font-bold text-red-700">My Admin</a>
        </div>

        <!-- Right: Notifications + User Menu -->
        <div class="flex items-center gap-5" x-data="{ notifOpen: false, userOpen: false }">

            <!-- Notifications -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="relative text-red-700 focus:outline-none">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </button>
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white rounded border border-gray-300 shadow-lg z-50"
                     x-cloak>
                    <ul class="text-sm text-gray-700">
                        <li><a href="#" class="block px-4 py-2 text-red-700 hover:bg-gray-100">New User</a></li>
                        <li><a href="#" class="block px-4 py-2 text-red-700 hover:bg-gray-100">System Update</a></li>
                        <li><a href="#" class="block px-4 py-2 text-red-700 hover:bg-gray-100">New Order</a></li>
                    </ul>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex items-center gap-2 text-red-700 font-semibold focus:outline-none">
                    <span>{{ ucwords(Auth::user()->first_name) ?? 'Admin' }}</span>
                    <i class="fas fa-chevron-down text-[10px] transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                </button>
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-40 bg-white border border-gray-300 rounded shadow-lg z-50"
                     x-cloak>
                    <ul class="text-sm text-gray-700">
                        <li><a href="#" class="block px-4 py-2 text-red-700 hover:bg-gray-100">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left text-red-700 px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>
