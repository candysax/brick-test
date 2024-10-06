@props(['type', 'action', 'method', 'category' => null])

<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900">
            Информация о категории
        </h2>
    </header>

    <form action="{{ $action }}" method="post" class="mt-6 space-y-6">
        @csrf

        @if (strtolower($method) !== 'post')
            @method($method)
        @endif

        <div>
            <x-input-label for="category_name" value="Название *" />
            <x-text-input id="category_name" name="category_name" type="text" class="mt-1 block w-full" :value="old('category_name', $category?->name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('category_name')" />
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('categories.index') }}"><x-secondary-button>Отменить</x-secondary-button></a>
            <x-primary-button type="submit">Сохранить</x-primary-button>
        </div>
    </form>
</section>
