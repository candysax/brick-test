<x-app-layout>
    <x-slot name="title">Новая категория</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Новая категория
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-categories.form type="update" :action="route('categories.store')" method="POST" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
