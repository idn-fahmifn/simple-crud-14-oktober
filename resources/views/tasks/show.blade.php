<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden mt-4 p-4 shadow-sm sm:rounded-lg">

                <div class="flex justify-between">
                    <div class="">
                        <h2 class="text-lg font-bold mb-2">{{$data->task_title}}</h2>
                        <p class="text-xs text-slate-600 mb-2">Progress : <span class="text-green-500">{{$data->progress}} % </span> </p>
                        <p class="">{{$data->desc}}</p>
                    </div>
                    <div class="">

                        <form action="{{route('tasks.destroy', $data->uuid)}}" method="post">
                            @csrf
                            @method('delete')
                            <x-secondary-button class="" type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'open-new')">
                                Edit Task
                            </x-secondary-button>

                            <x-danger-button onclick="return confirm('are you sure?')" type="submit">
                                Delete Task
                            </x-danger-button>

                        </form>

                        
                    </div>
                </div>

                <img src="{{ asset('storage/tasks/' . $data->image_cover) }}" class="img-full h-[100px] mt-4" alt="">

            </div>

            @if (session('success'))
                <div x-data="{ open: true }" x-show="open" class="flex justify-between p-4 my-4 text-green-800 bg-green-50 rounded-lg" role="alert">
                <!-- Teks Alert -->
                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
                
                <!-- Tombol Silang (Close) -->
                <button @click="open = false" type="button" class="text-green-500 hover:bg-green-100 rounded-lg p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @endif  
            
            <div class="border border-slate-300 overflow-hidden mt-4 p-4 shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">

                <!-- looping data :  -->

                    
                </div>
            </div>
        </div>
    </div>

    <x-modal name="open-new" :show="false" focusable>
        <div class="p-8">
            <h2>New Task</h2>

            <form action="{{route('tasks.update', $data->uuid)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <div class="my-4">
                    <x-input-label for="nama_tugas" :value="__('Task Name')" />
                    <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text" name="nama_tugas" :value="old('nama_tugas', $data->task_title)" required />
                    <x-input-error :messages="$errors->get('nama_tugas')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-input-label for="image" :value="__('Image Cover')" />
                    <x-text-input id="image" class="block mt-1 w-full py-6 px-2 border border-dashed" type="file" name="image" :value="old('image')" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-input-label for="deskripsi" :value="__('Description')" />
                    <x-textarea class="block mt-1 w-full" name="deskripsi">{{old('deskripsi', $data->desc)}}</x-textarea>
                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x-secondary-button type="submit">Save</x-secondary-button>
                </div>

            </form>

        </div>
    </x-modal>

</x-app-layout>
