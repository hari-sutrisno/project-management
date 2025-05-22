<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Project</h2>
                <p class="text-3xl text-indigo-600 mt-2">{{ $totalProjects }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Task</h2>
                <p class="text-3xl text-indigo-600 mt-2">{{ $totalTasks }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Task: Pending</h2>
                <p class="text-3xl text-yellow-500 mt-2">{{ $pendingTasks }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Task: In Progress</h2>
                <p class="text-3xl text-blue-500 mt-2">{{ $inProgressTasks }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Task: Done</h2>
                <p class="text-3xl text-green-600 mt-2">{{ $doneTasks }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
