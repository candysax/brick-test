<x-app-layout>
    <x-slot name="title">Клиенты</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Поиск по клиентам
        </h2>
    </x-slot>

    <div class="py-12 space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('users.index') }}" method="GET" class="p-6 w-full flex space-x-4">
                    <x-text-input name="search" placeholder="Введите запрос..." class="flex-1" value="{{ $searchQuery }}" />
                    <x-primary-button type="submit">Поиск</x-primary-button>
                    <a href="{{ route('users.index') }}" class="inline-flex"><x-secondary-button type="button">Отмена</x-secondary-button></a>
                </form>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-users.table :users="$users" />
            </div>
        </div>
    </div>
</x-app-layout>
