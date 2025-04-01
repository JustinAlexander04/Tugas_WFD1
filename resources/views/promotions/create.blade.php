@extends('base.base')

@section('content')
    <h1 class="text-4xl w-fit font-semibold mx-auto mb-4 text-center">Add Event Promotion</h1>
    <div class="flex flex-col gap-4 max-w-2xl mx-auto">
        <form action="{{ route('promotions.store') }}" enctype="multipart/form-data" method="POST"
            class="p-4 flex flex-col gap-2">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-md"
                    required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description"
                    class="w-full [field-sizing:content] p-2 border border-gray-300 rounded-md" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Event poster</label>
                <input type="file" accept="image/*" id="image" name="image"
                    class="w-full p-2 border border-gray-300 rounded-md" required>

            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-slate-900 cursor-pointer w-full max-w-md mx-auto text-white px-4 py-2 rounded-xl hover:bg-slate-800 transition">Create</button>
            </div>
        </form>
    </div>
@endsection
