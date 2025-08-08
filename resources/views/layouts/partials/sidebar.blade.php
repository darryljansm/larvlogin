<!-- Sidebar -->
<div id="sidebar"
     class="fixed top-0 left-0 z-40 h-full w-60 bg-white border-r border-gray-200 p-4 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <ul class="space-y-2 mt-16">
        <li>
            <a href="#"
               class="flex items-center text-red-700 font-semibold px-3 py-2 rounded hover:bg-gray-100 transition">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>

        <!-- Sidebar Item with Submenu -->
        <li x-data="{ open: false }" class="text-sm text-red-700">
            <button @click="open = !open"
                    class="flex justify-between items-center w-full px-4 py-2 font-semibold hover:bg-gray-100 rounded transition">
                <span class="flex items-center gap-2">
                    <i class="fas fa-folder"></i>
                    <span>Sample Menu</span>
                </span>
                <i class="fas fa-chevron-down text-xs transform transition-transform duration-200"
                :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-cloak class="ml-8 mt-1 space-y-1">
                <a href="#" class="block px-3 py-1 hover:font-semibold transition">Submenu One</a>
                <a href="#" class="block px-3 py-1 hover:font-semibold transition">Submenu Two</a>
            </div>
        </li>

    </ul>
</div>
