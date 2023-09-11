<x-guest-layout>
    <div class="max-w-4xl px-4 mx-auto">
        <h1 class="text-5xl mb-4 mt-6 flex gap-1 items-center">
            <svg class="w-12 h-12" viewBox="0 0 24 24" aria-hidden="true" class="r-18jsvk2 r-4qtqp9 r-yyyyoo r-16y2uox r-8kz0gk r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-lrsllp"><g><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></g></svg>
            30 days challenge
        </h1>

        @volt
        <div class="flex flex-col gap-6 mt-20">
        @foreach ($challengers as $challenger)
            <div wire:key="challenger-{{ $challenger->id }}">
                <h2 class="text-2xl mb-6">{{ $challenger->name }}</h2>

                <div class="grid grid-cols-15 gap-1">
                    @for ($i = 0; $i < 30; $i++)
                        @if (isset($challenger->days[$i]))
                            <div class="border p-4 rounded text-center text-green-500">🎉</div>
                        @else
                            <button wire:click="register({{ $challenger->id }}, {{ $i }})"
                                    class="border p-4 rounded group text-center"
                            >
                                <div class="group-hover:hidden">
                                    {{ $i + 1 }}
                                </div>

                                <div class="group-hover:block hidden text-gray-300 opacity-50">
                                    &#127881;
                                </div>
                            </button>
                        @endif
                    @endfor
                </div>
            </div>
        @endforeach
        </div>
        @endvolt
    </div>
</x-guest-layout>

<?php

use function Livewire\Volt\{state};

state(challengers: \App\Models\Challenger::all());

$register = function (\App\Models\Challenger $challenger, $day) {
    $challenger->days = array_merge($challenger->days ?? [], [$day => true]);
    $challenger->save();

    $this->challengers = \App\Models\Challenger::all();
};
