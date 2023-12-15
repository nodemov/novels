<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novels') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @foreach ($novels as $item)
                    <div class="bg-white shadow-sm p-4 mb-4">
                        <img class="mb-2" style="width:193px;height:278px"
                            src="{{ Arr::get($item, 'image', asset('assets/images/default-img.jpg')) }}">
                        <div class="card-body">
                            <p class="text-base font-black">{{ $item->name ?? '-' }}</p>
                            <div class="flex justify-between">
                                <p class="text-base text-gray-800">Start: {{ $item->start ?? '-' }}</p>
                                <p class="text-base text-gray-800">Now: {{ $item->now ?? '-' }}</p>
                                <p class="text-base text-gray-800">End: {{ $item->end ?? '-' }}</p>
                                <p class="text-base text-gray-800">Count: {{ $item->chapters_count ?? '0' }}</p>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <div class="btn-group">
                                    <a href="{{ route('novel.show', $item->id) }}"
                                        class="px-6 py-2 text-sm rounded shadow hover:bg-cyan-200 text-white"
                                        style="background-color:#22d3ee">All</a>
                                    <a href="{{ route('chapters', $item->id) }}"
                                        class="px-6 py-2 text-sm rounded shadow bg-cyan hover:bg-cyan-200 text-white"
                                        style="background-color:#22c55e">Chapter</a>
                                </div>
                                <small class="text-body-secondary">
                                    <span class="badge rounded-pill text-bg-success">Last Update</span>
                                    {{ Arr::get($item, 'chapter_latest.created_at') }} |
                                    <b class="text-success">{{ Arr::get($item, 'chapter_latest.chapter') }}</b>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
