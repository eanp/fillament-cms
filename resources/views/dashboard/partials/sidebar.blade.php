<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-card shadow-md transition-all duration-300 ease-in-out transform -translate-x-full md:translate-x-0">
    <div class="p-4 border-b border-border flex justify-between items-center">
        <span class="text-sm font-bold flex">Laravel</span>

        <button id="sidebarToggle" class="text-muted-foreground hover:text-card-foreground md:block hidden">
            <i class="ri-menu-fold-line"></i>
        </button>
    </div>

    <nav class="p-4 flex-grow">
        <ul class="space-y-2">
            <li>
                <a href="/"
                    class="flex items-center text-card-foreground hover:bg-accent hover:text-accent-foreground rounded p-2">
                    <i class="ri-home-line mr-3"></i>
                    <span class="sidebar-text">Home</span>
                </a>
            </li>

            @if (auth()->user()->isAdmin())
                <li>
                    <a href="/admin"
                        class="flex items-center text-card-foreground hover:bg-accent hover:text-accent-foreground rounded p-2">
                        <i class="ri-dashboard-line mr-3"></i>
                        <span class="sidebar-text">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/users"
                        class="flex items-center text-card-foreground hover:bg-accent hover:text-accent-foreground rounded p-2">
                        <i class="ri-user-settings-line mr-3"></i>
                        <span class="sidebar-text">User Management</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->isWriter() || auth()->user()->isAdmin())
                <li>
                    <a href="/blog"
                        class="flex items-center text-card-foreground hover:bg-accent hover:text-accent-foreground rounded p-2">
                        <i class="ri-book-line mr-3"></i>
                        <span class="sidebar-text">Blog</span>
                    </a>
                </li>
            @endif

            <li class="border-t border-border">
                <a href="/profile"
                    class="flex items-center text-card-foreground hover:bg-accent hover:text-accent-foreground rounded p-2">
                    <i class="ri-settings-line mr-3"></i>
                    <span class="sidebar-text">Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-4 border-t border-border fixed bottom-0 w-full">
        <div class="flex items-center justify-between mb-2">
            <a href="/logout"
                class="flex items-center text-card-foreground hover:bg-red-100 hover:text-red-500 rounded p-2">
                <i class="ri-logout-box-line mr-3 text-red-500"></i>
                <span class="sidebar-text text-red-500">Logout</span>
            </a>
            <button id="darkModeToggle"
                class="px-2 py-1 rounded-md bg-secondary text-secondary-foreground hover:bg-primary hover:text-primary-foreground transition-colors duration-200">
                <i class="ri-sun-line dark:ri-moon-line"></i>
            </button>
        </div>
    </div>
</aside>
