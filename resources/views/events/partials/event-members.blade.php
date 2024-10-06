<section>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight px-6 pt-5">Участники</h3>
    <hr class="mt-3">

    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Имя
                </th>

                <th scope="col" class="px-6 py-3">
                    Эл. почта
                </th>

                @if(auth()->user()?->isAdmin())
                    <th scope="col" class="px-6 py-3"></th>
                @endif
            </tr>
            </thead>

            <tbody>
            @if(auth()->user()?->isMember($event))
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ auth()->user()->name }}
                    </th>

                    <td class="px-6 py-4">
                        {{ auth()->user()->email }}
                    </td>
                </tr>
            @endif

            @foreach($event->users->except(auth()->user()->id ?? null) as $user)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $user->name }}
                    </th>

                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>

                    @if(auth()->user()?->isAdmin())
                        <td class="py-4">
                            <form action="{{ route('events.remove-user', [$event]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="font-medium text-indigo-700 hover:underline">Исключить</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
