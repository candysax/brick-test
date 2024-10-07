@props(['events'])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="w-2/5 px-6 py-3">
                Название
            </th>
            <th scope="col" class="w-1/5 px-6 py-3">
                Дата и время
            </th>
            <th scope="col" class="w-1/5 px-6 py-3">
                Кол-во участников
            </th>
            <th scope="col" class="w-1/5 px-6 py-3">
                Категории
            </th>
            <th scope="col" class="w-1/5 px-6 py-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <x-events.table-item :event="$event" />
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($events, 'links') && $events->hasPages())
    <div class="px-6 py-4">
        {{ $events->links() }}
    </div>
@endif
