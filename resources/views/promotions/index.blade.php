@extends('base.base')

@section('content')
    <h1 class="text-4xl w-fit font-semibold mx-auto mb-4 text-center">Get the latest info on ongoing Event Promotions</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($promotions as $promotion)
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col gap-2">
                <h2 class="text-2xl font-semibold">{{ $promotion->title }}</h2>
                <img src="{{ Str::startsWith($promotion->image, 'promo-') ? asset('images/' . $promotion->image) : asset('storage/' . $promotion->image) }}"
                    alt="{{ $promotion->title }}" class="w-full h-64 object-contain rounded-lg mb-4">

                <a href="{{ route('promotions.show', $promotion) }}" class="text-blue-500 group hover:underline">View Details
                    <i class="fa-solid fa-chevron-right h-4 w-3 group-hover:translate-x-0.5 text-sm transition"></i></a>
            </div>
        @endforeach
    </div>
@endsection
