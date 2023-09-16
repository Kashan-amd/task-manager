<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periodic Task App') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col items-center justify-center">
            <div class="p-4 bg-white shadow px-12">
                All Tasks
            </div>
        </div>
    </div>
    
    @livewire('task-group-tabs')
    

</x-app-layout>

