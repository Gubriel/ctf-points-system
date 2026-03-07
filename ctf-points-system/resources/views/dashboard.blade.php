<x-app-layout>

    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 mt-10 lg:px-8">
            <div class="bg-black border-4 border-green-600 overflow-hidden shadow-sm">
                <div class="p-4 text-center text-2xl text-green-500">
                    {{ __("LIDERES") }}
                </div>
                <div class="h-16 w-full -translate-x-full animate-shimmer bg-gradient-to-r from-transparent via-green-500/100 to-transparent blur-sm"></div>
            </div>
        </div>
    </div>
</x-app-layout>
