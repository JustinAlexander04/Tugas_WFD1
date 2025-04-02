@extends('base.base')

@section('content')
    <div class="flex flex-col gap-2 max-w-2xl mx-auto">
        <a href="{{ route('promotions.index') }}" class="group text-slate-400 hover:underline text-sm"> <i
                class="fa-solid h-4 w-3 text-xs fa-chevron-left group-hover:-translate-x-0.5 transition"></i>Back</a>
        <h1 class="text-4xl w-fit font-semibold ">{{ $promotion->title }}</h1>
        <p class="text-gray-500 text-sm">Created at: {{ $promotion->created_at->format('d M Y') }}</p>

        <img src="{{ Str::startsWith($promotion->image, 'promo-') ? asset('images/' . $promotion->image) : asset('storage/' . $promotion->image) }}"
            alt="{{ $promotion->title }}" class="w-full h-64 object-contain rounded-lg mb-4">

        <p class="text-gray-700">Event description</p>
        <p class="text-gray-700">{{ $promotion->description }}</p>

        <div class="flex gap-2 justify-end mt-4">
            <a href="{{ route('promotions.edit', $promotion) }}"
                class="bg-slate-900 cursor-pointer  text-white px-4 py-2 flex gap-2 items-center rounded-xl hover:bg-slate-800 transition"><i
                    class="fa-solid fa-pencil"></i>Edit</a>
            <form action="{{ route('promotions.destroy', $promotion) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 cursor-pointer  text-white px-4 py-2 flex gap-2 items-center rounded-xl hover:bg-red-500 transition"><i
                        class="fa-solid fa-trash"></i>Delete</button>
            </form>

        </div>

    </div>
@endsection
