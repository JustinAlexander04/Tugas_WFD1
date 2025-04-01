@extends('base.base')

@section('content')
    <a href="{{ route('promotions.show', $promotion->id) }}" class="group text-slate-400 hover:underline text-sm"> <i
            class="fa-solid h-4 w-3 text-xs fa-chevron-left px-4 group-hover:-translate-x-0.5 transition"></i>Back</a>
    <h1 class="text-4xl w-fit font-semibold mx-auto mb-4 text-center">Edit {{ $promotion->title }}</h1>
    <form action="{{ route('promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data"
        class="p-4 flex flex-col gap-2">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $promotion->title }}"
                class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea id="description" name="description"
                class="[field-sizing:content] w-full p-2 border border-gray-300 rounded-md" required>{{ $promotion->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Event poster</label>
            <input type="file" accept="image/*" id="image" name="image"
                class="w-full p-2 border border-gray-300 rounded-md">

        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="bg-slate-900 cursor-pointer w-full max-w-md mx-auto text-white px-4 py-2 rounded-xl hover:bg-slate-800 transition">Update</button>
        </div>
    </form>
@endsection
