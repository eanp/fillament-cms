<x-app-layout>
    <div class="flex h-screen overflow-hidden">

        @include('dashboard.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto md:ml-64 transition-all duration-300 ease-in-out">

            <button id="mobileSidebarToggle"
                class="md:hidden fixed z-0 text-foreground hover:text-primary bg-secondary hover:bg-primary px-1 rounded-md transition-colors duration-200">
                <i class="ri-menu-line text-xl"></i>
            </button>

            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                        Admin Dashboard
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Manage your users and content
                    </p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h2 class="text-sm font-medium text-gray-700">Total Users</h2>
                            <span class="text-2xl font-bold text-gray-900">{{ $totalUsers ?? 0 }}</span>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h2 class="text-sm font-medium text-gray-700">Writers</h2>
                            <span class="text-2xl font-bold text-gray-900">{{ $writers ?? 0 }}</span>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h2 class="text-sm font-medium text-gray-700">Drafters</h2>
                            <span class="text-2xl font-bold text-gray-900">{{ $drafters ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Users</h2>
                            <button
                                class="px-4 py-2 bg-gray-900 text-white text-sm font-semibold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                                Add User
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Role</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($users ?? [] as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                                {{ $user->role === 'writer' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $user->role === 'drafter' ? 'bg-green-100 text-green-800' : '' }}">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <button class="text-gray-600 hover:text-gray-900">Edit</button>
                                                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <script src="@vite('resources/js/dashboard.js')"></script>

</x-app-layout>
