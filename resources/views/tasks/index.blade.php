<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                <div class="bg-blue-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-lg font-bold uppercase text-white">Total Tasks</h2>
                        <p class="text-3xl font-[900] uppercase text-white">20</p>
                    </div>
                </div>
                <div class="bg-blue-400 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-lg font-bold uppercase text-white">Percentage</h2>
                        <p class="text-3xl font-[900] uppercase text-white">20%</p>
                    </div>
                </div>
                <div class="bg-yellow-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-lg font-bold uppercase text-white">In Progress</h2>
                        <p class="text-3xl font-[900] uppercase text-white">20</p>
                    </div>
                </div>
                <div class="bg-green-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-lg font-bold uppercase text-white">Task Done</h2>
                        <p class="text-3xl font-[900] uppercase text-white">20</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden mt-4 p-4 shadow-sm sm:rounded-lg">

                <div class="flex justify-between">
                    <div class="">
                        <h2 class="text-lg font-bold">My Tasks</h2>
                        <p>List of my task</p>
                    </div>
                    <div class="">
                        <x-secondary-button class="">
                        Add new task
                        </x-secondary-button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
