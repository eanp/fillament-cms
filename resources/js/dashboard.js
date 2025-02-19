document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarTexts = document.querySelectorAll('.sidebar-text');
    const mainContent = document.querySelector('main');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;

    // Toggle the sidebar on desktop
    const toggleDesktopSidebar = () => {
        const isSidebarExpanded = sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-16');
        mainContent.classList.toggle('md:ml-64', isSidebarExpanded);
        mainContent.classList.toggle('md:ml-16', !isSidebarExpanded);

        sidebarTexts.forEach(text => text.classList.toggle('hidden'));
        const icon = sidebarToggle.querySelector('i');
        icon.classList.toggle('ri-menu-fold-line', !isSidebarExpanded);
        icon.classList.toggle('ri-menu-unfold-line', isSidebarExpanded);
    };

    // Toggle the sidebar on mobile
    const toggleMobileSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');
    };

    // Toggle dark mode
    const toggleDarkMode = () => {
        const isDarkMode = html.classList.toggle('dark');
        localStorage.theme = isDarkMode ? 'dark' : 'light';
        updateDarkModeIcon();
    };

    // Update dark mode icon based on the theme
    const updateDarkModeIcon = () => {
        const icon = darkModeToggle.querySelector('i');
        icon.classList.toggle('ri-sun-line', html.classList.contains('dark'));
        icon.classList.toggle('ri-moon-line', !html.classList.contains('dark'));
    };

    // Handle resize events for mobile view
    const handleResize = () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            mainContent.classList.add('md:ml-64');
        } else {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('w-16');
            sidebar.classList.add('w-64');
            sidebarTexts.forEach(text => text.classList.remove('hidden'));
            mainContent.classList.remove('md:ml-16');
        }
    };

    // Initialize
    const initialize = () => {
        if (window.innerWidth >= 768) {
            mainContent.classList.add('md:ml-64');
        }

        // Check for saved theme preference or use system preference
        const storedTheme = localStorage.theme;
        if (storedTheme === 'dark' || (!storedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        updateDarkModeIcon();
    };

    // Event listeners
    sidebarToggle.addEventListener('click', toggleDesktopSidebar);
    mobileSidebarToggle.addEventListener('click', toggleMobileSidebar);
    sidebarOverlay.addEventListener('click', toggleMobileSidebar);
    darkModeToggle?.addEventListener('click', toggleDarkMode);
    window.addEventListener('resize', handleResize);

    // Call initialize function
    initialize();
});
