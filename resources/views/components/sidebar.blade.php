<div id="sidebarBackdrop"
    class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden transition-opacity duration-200">
</div>

<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-64 transform -translate-x-full md:translate-x-0 md:static md:inset-auto md:z-auto bg-white border-r border-gray-200 shadow-lg md:shadow-none transition-transform duration-300 ease-in-out">
    <div class="h-full flex flex-col">
        <!-- Sidebar header (mobile) -->
        <div class="flex items-center justify-between px-4 py-3 md:hidden border-b border-gray-200">
            <span class="font-semibold text-gray-800">Navigation</span>
            <button id="sidebarClose"
                class="inline-flex items-center justify-center p-2 rounded-lg border border-gray-200 hover:bg-gray-50">
                ✖
            </button>
        </div>


        <!-- Menu -->
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto text-sm">
            <a href="{{ route('service-ticket') }}"
                class="flex items-center px-3 py-2 rounded-lg font-medium text-gray-900 bg-gray-100 border-l-4 border-indigo-500 hover:bg-gray-50 hover:text-gray-900">
                <span class="mr-2">🏠</span>
                <span>Services Ticket</span>
            </a>
        </nav>

        <!-- Footer -->
        <div class="px-4 py-3 border-t border-gray-200 text-xs text-gray-500">
            QN Interview
        </div>
    </div>
</aside>
