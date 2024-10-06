@props(['categories', 'event' => null, 'name' => 'categories[]'])

<div {!! $attributes->merge(['class' => 'h-[200px] overflow-x-auto border rounded-md p-6']) !!}>
    @foreach($categories as $category)
        <div class="flex items-center mb-4">
            <input id="{{ $category->id }}" name="{{ $name }}" type="checkbox" value="{{ $category->id }}" @if($event?->categories->contains('id', $category->id)) checked @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
            <label for="{{ $category->id }}" class="ms-2 text-sm font-medium text-gray-900">{{ $category->name }}</label>
        </div>
    @endforeach
</div>
