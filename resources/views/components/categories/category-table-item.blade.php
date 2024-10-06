@props(['category'])

<tr class="bg-white border-b">
    <th scope="row" class="w-3/4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        <span class="text-md">{{ $category->name }}</span>
    </th>

    <td class="w-1/4 px-6 py-4">
        <div class="flex items-center space-x-2">
            <a href="{{ route('categories.edit', [$category]) }}"><x-secondary-button>Изменить</x-secondary-button></a>
            <form action="{{ route('categories.destroy', [$category]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-secondary-button type="submit">Удалить</x-secondary-button>
            </form>
        </div>
    </td>
</tr>
