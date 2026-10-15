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
                        <x-secondary-button class="" type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'open-new')">
                            Add new task
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="open-new" :show="false" focusable>
        <div class="p-8">
            <h2>New Task</h2>

            <form action="" method="post">
                @csrf

                <div class="my-4">
                    <x-input-label for="nama_tugas" :value="__('Task Name')" />
                    <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text" name="nama_tugas" :value="old('nama_tugas')" required />
                    <x-input-error :messages="$errors->get('nama_tugas')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-input-label for="image" :value="__('Image Cover')" />
                    <x-text-input id="image" class="block mt-1 w-full py-6 px-2 border border-dashed" type="file" name="image" :value="old('image')" required />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-input-label for="deskripsi" :value="__('Description')" />
                    <x-textarea class="block mt-1 w-full" ></x-textarea>
                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-secondary-button type="submit">Save</x-secondary-button>
                </div>

            </form>

        </div>
    </x-modal>

</x-app-layout>
