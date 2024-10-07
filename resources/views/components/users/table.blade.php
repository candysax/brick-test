@props(['users'])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="w-2/6 px-6 py-3">
                Имя
            </th>
            <th scope="col" class="w-2/6 px-6 py-3">
                Эл. почта
            </th>
            <th scope="col" class="w-1/6 px-6 py-3">
                Дата регистрации
            </th>
            <th scope="col" class="w-1/6 px-6 py-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <x-users.table-item :user="$user" />
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($users, 'links') && $users->hasPages())
    <div class="px-6 py-4">
        {{ $users->links() }}
    </div>
@endif
