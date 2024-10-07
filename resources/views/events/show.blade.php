<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->name }}
        </h2>
        @if(auth()->user()?->isAdmin())
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-2">
                <a href="{{ route('events.edit', [$event]) }}"><x-secondary-button>Изменить</x-secondary-button></a>

                <x-events.toggle-button :event="$event" />
            </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @include('events.partials.event-info')
            </div>
        </div>
        <div class="flex flex-col lg:flex-row items-start max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 space-y-6 lg:space-y-0 space-x-0 lg:space-x-6">
            <div class="bg-white w-full lg:w-4/6 overflow-hidden shadow-sm sm:rounded-lg">
                @include('events.partials.event-members')
            </div>


            <div class="bg-white w-full lg:w-2/6 overflow-hidden shadow-sm sm:rounded-lg">
                @include('events.partials.event-categories')
            </div>
        </div>
    </div>
</x-app-layout>
