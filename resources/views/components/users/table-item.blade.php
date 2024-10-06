@props(['user'])

<tr class="bg-white border-b">
    <th scope="row" class="w-2/6 px-6 py-4 text-gray-900 whitespace-nowrap">
        <span class="text-md font-medium">{{ $user->name }}</span>
        @if(!$user->email_verified_at)
            <span class="text-xs font-normal">(Не подтверждён)</span>
        @endif
    </th>

    <td class="w-2/6 px-6 py-4">
        {{ $user->email }}
    </td>

    <td class="w-1/6 px-6 py-4">
        {{ $user->created_at->format('d.m.Y H:i') }}
    </td>

    <td class="w-1/6 px-6 py-4">
        <div class="flex items-center space-x-2">
            @if(!$user->is_banned)
            <form action="{{ route('users.ban', [$user]) }}" method="post">
                @csrf
                @method('PATCH')
                <x-secondary-button type="submit">Бан</x-secondary-button>
            </form>
            @else
            <form action="{{ route('users.unban', [$user]) }}" method="post">
                @csrf
                @method('PATCH')
                <x-primary-button type="submit">Разбан</x-primary-button>
            </form>
            @endif
            <form action="{{ route('users.destroy', [$user]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-secondary-button type="submit">Удалить</x-secondary-button>
            </form>
        </div>
    </td>
</tr>
