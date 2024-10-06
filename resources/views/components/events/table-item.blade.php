@props(['event'])

<tr class="bg-white border-b">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        <a href="{{ route('events.show', [$event]) }}"><strong class="underline text-md">{{ $event->name }}</strong></a>
        @if(auth()->user()?->isAdmin())
            <div class="flex items-center space-x-2 mt-4">
                <a href="{{ route('events.edit', [$event]) }}"><x-secondary-button>Изменить</x-secondary-button></a>

                <x-events.toggle-button :event="$event" />
            </div>
        @endif
    </th>
    <td class="px-6 py-4">
        {{ $event->formatedStartTime() }}
    </td>
    <td class="px-6 py-4">
        {{ $event->users->count() }} чел.
    </td>
    <td class="px-6 py-4">
        @foreach($event->categories as $category)
            {{ $category->name }}@if(! $loop->last),@endif
        @endforeach
    </td>
    <td class="px-6 py-4">
        <x-events.join-button :event="$event" />
    </td>
</tr>
