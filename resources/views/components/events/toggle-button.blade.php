@props(['event'])

<form action="{{ route('events.toggle', [$event]) }}" method="post">
    @csrf
    @method('PATCH')

    @if($event->is_hidden)
        <x-secondary-button type="submit">Показать</x-secondary-button>
    @else
        <x-secondary-button type="submit">Скрыть</x-secondary-button>
    @endif
</form>
