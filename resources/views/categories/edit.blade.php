<x-app-layout>
    <x-slot name="title">Изменить категорию</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Категория: {{ $category->name }}
        </h2>
        <div class="flex items-center space-x-2">
            <form action="{{ route('categories.destroy', [$category]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-danger-button type="submit">Удалить</x-danger-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-categories.form type="update" :action="route('categories.update', [$category])" method="PUT" :category="$category" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
