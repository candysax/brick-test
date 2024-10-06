@props(['type', 'action', 'method', 'categories', 'event' => null])

<section>
    <header>
        <h2 class="text-xl font-medium text-gray-900">
            Информация о мероприятии
        </h2>
    </header>

    <form action="{{ $action }}" method="post" class="mt-6 space-y-6">
        @csrf

        @if (strtolower($method) !== 'post')
            @method($method)
        @endif

        <div>
            <x-input-label for="event_name" value="Название *" />
            <x-text-input id="event_name" name="event_name" type="text" class="mt-1 block w-full" :value="old('event_name', $event?->name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('event_name')" />
        </div>

        <div>
            <x-input-label for="event_start_time" value="Дата начала *" />
            <x-datetime-input id="event_start_time" name="event_start_time" type="text" class="mt-1 block w-full" :value="old('event_start_time', $event?->start_time->format('Y-m-d\TH:i'))" />
            <x-input-error class="mt-2" :messages="$errors->get('event_start_time')" />
        </div>

        <div>
            <x-input-label for="event_link" value="Ссылка" />
            <x-text-input id="event_link" name="event_link" type="text" class="mt-1 block w-full" :value="old('event_link', $event?->link)" />
            <x-input-error class="mt-2" :messages="$errors->get('event_link')" />
        </div>

        <div>
            <x-input-label for="event_description" value="Описание" />
            <x-text-area id="event_description" name="event_description" type="text" class="h-[150px] mt-1 block w-full">{{ old('event_description', $event?->description) }}</x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('event_description')" />
        </div>

        <div>
            <p class="block font-medium text-sm text-gray-700">Категории</p>
            <x-events.event-category-select name="event_categories[]" :categories="$categories" :event="$event ?? null" class="mt-1" />
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route('events.index') }}"><x-secondary-button>Отменить</x-secondary-button></a>
            <x-primary-button type="submit">Сохранить</x-primary-button>
        </div>
    </form>
</section>
