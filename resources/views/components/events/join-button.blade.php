@props(['event'])

@auth
    @if(!auth()->user()->isMember($event))
        <form action="{{ route('events.join', [$event]) }}" method="post">
            @csrf
            <x-primary-button type="submit">Записаться</x-primary-button>
        </form>
    @else
        <form action="{{ route('events.leave', [$event]) }}" method="post">
            @csrf
            @method('DELETE')
            <x-secondary-button type="submit">Выйти</x-secondary-button>
        </form>
    @endif
@endauth
@guest
    <a href="{{ route('login') }}"><x-primary-button>Записаться</x-primary-button></a>
@endguest
