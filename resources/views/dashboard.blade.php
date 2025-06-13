<x-app-layout title="Dashboard">
    <x-slot name="heading">
        Dashboard
    </x-slot>

    <div class="py-2">
        <!-- Stats Cards Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                        <p class="text-2xl font-semibold text-gray-800">$48,234</p>
                    </div>
                    <div class="p-3 rounded-full bg-gray-100 text-gray-800">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-red-600 text-sm font-medium">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">New Users</p>
                        <p class="text-2xl font-semibold text-gray-800">1,245</p>
                    </div>
                    <div class="p-3 rounded-full bg-gray-100 text-gray-800">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-red-600 text-sm font-medium">
                        <i class="fas fa-arrow-up"></i> 8.2%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Conversion Rate</p>
                        <p class="text-2xl font-semibold text-gray-800">3.42%</p>
                    </div>
                    <div class="p-3 rounded-full bg-gray-100 text-gray-800">
                        <i class="fas fa-percentage"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-600 text-sm font-medium">
                        <i class="fas fa-arrow-down"></i> 1.1%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-gray-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pending Orders</p>
                        <p class="text-2xl font-semibold text-gray-800">56</p>
                    </div>
                    <div class="p-3 rounded-full bg-gray-100 text-gray-800">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-red-600 text-sm font-medium">
                        <i class="fas fa-arrow-up"></i> 5.3%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Sales Chart -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Sales Overview</h2>
                    <select class="text-sm border-gray-300 rounded-md focus:border-gray-800 focus:ring-gray-800 text-gray-700">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option selected>Last 12 Months</option>
                    </select>
                </div>
                <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center text-gray-400">
                    [Sales Chart Placeholder]
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <!-- User Acquisition -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">User Acquisition</h2>
                    <select class="text-sm border-gray-300 rounded-md focus:border-gray-800 focus:ring-gray-800 text-gray-700">
                        <option>By Channel</option>
                        <option selected>By Device</option>
                        <option>By Country</option>
                    </select>
                </div>
                <div class="h-64 bg-gray-50 rounded-md flex items-center justify-center text-gray-400">
                    [Pie Chart Placeholder]
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    <p>Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Top Products -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
                </div>
                <div class="divide-y divide-gray-200">
                    <!-- Activity Item 1 -->
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-800">New user registered</p>
                                <p class="text-sm text-gray-600">John Doe signed up 2 hours ago</p>
                                <p class="mt-1 text-xs text-gray-500">Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-800">New order placed</p>
                                <p class="text-sm text-gray-600">Order #3245 for $125.00</p>
                                <p class="mt-1 text-xs text-gray-500">Vestibulum ante ipsum primis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white rounded-lg shadow border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Top Products</h2>
                </div>
                <div class="divide-y divide-gray-200">
                    <!-- Product 1 -->
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-red-100 text-red-600 flex items-center justify-center">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-800">Premium Widget</p>
                                    <p class="text-sm font-semibold text-gray-800">$49.99</p>
                                </div>
                                <div class="mt-1 flex items-center justify-between">
                                    <p class="text-xs text-gray-600">125 sold this month</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-arrow-up mr-1"></i> 12%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-md bg-gray-100 text-gray-800 flex items-center justify-center">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-800">Basic Widget</p>
                                    <p class="text-sm font-semibold text-gray-800">$29.99</p>
                                </div>
                                <div class="mt-1 flex items-center justify-between">
                                    <p class="text-xs text-gray-600">98 sold this month</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-arrow-up mr-1"></i> 8%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
