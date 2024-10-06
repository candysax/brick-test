<section>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight px-6 pt-5">Категории</h3>
    <hr class="mt-3">

    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Название
                </th>
            </tr>
            </thead>
            
            <tbody>
            @foreach($event->categories as $category)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $category->name }}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
