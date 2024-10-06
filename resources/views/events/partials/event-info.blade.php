<section>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Описание</h3>
    <hr class="mt-3 mb-4">

    @if ($event->description)
        <p>{{ $event->description }}</p>
        <br>
    @endif

    @if ($event->start_time)
        <p><strong>Дата и время начала:</strong> {{ $event->formatedStartTime() }}</p>
    @endif
    @auth
        @if ($event->link && (auth()->user()->isAdmin() || auth()->user()->isMember($event)))
            <a href="{{ $event->link }}" target="_blank">
                <strong>Ссылка на вебинар:</strong>
                <span class="text-indigo-700 hover:underline">
                    {{ $event->link }}
                </span>
            </a>
        @endif
    @endauth

    <br>
    <br>

    <x-events.event-join-button :event="$event" />
</section>
