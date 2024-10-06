<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Категории
        </h2>
        <div class="flex items-center space-x-2">
            <a href="{{ route('categories.create') }}"><x-secondary-button>Создать</x-secondary-button></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-categories.table :categories="$categories" />
            </div>
        </div>
    </div>
</x-app-layout>
