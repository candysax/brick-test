@props(['categories'])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="w-2/6 px-6 py-3">
                Название
            </th>
            <th scope="col" class="w-1/6 px-6 py-3"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)
            <x-categories.category-table-item :category="$category" />
        @endforeach
        </tbody>
    </table>
</div>
