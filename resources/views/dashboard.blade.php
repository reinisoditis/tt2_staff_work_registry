<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dboard.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        <div class="flex-1 px-4 border sm:rounded-lg mx-4 py-4 text-sm font-medium">
                            <h2 class=" mb-2 text-xl leading-7  text-gray-700">{{ __('dboard.register_wreports') }}</h2>
                            <p class="text-sm text-gray-500">{{ __('dboard.wreports_text') }}</p>
                            <x-button class="py-4 mt-4"><a href="{{ route('works.create') }}">{{ __('dboard.create') }}</a></x-button>
                        </div>
                        <div class="flex-1 px-4 border sm:rounded-lg mx-4 py-4 text-sm font-medium">
                            <h2 class=" mb-2 text-xl leading-7  text-gray-700">{{ __('dboard.preport') }}</h2>
                            <p class="text-sm text-gray-500">{{ __('dboard.preporttext') }}</p>
                            <x-button class="py-4 mt-4"><a href="{{ route('reports.personal_index') }}">{{ __('dboard.show') }}</a></x-button>
                        </div>
                        <div class="flex-1 px-4 border sm:rounded-lg mx-4 py-4 text-sm font-medium">
                            <h2 class=" mb-2 text-xl leading-7  text-gray-700">{{ __('dboard.pjreport') }}</h2>
                            <p class="text-sm text-gray-500">{{ __('dboard.pjreporttext') }}</p>
                            <x-button class="py-4 mt-4"><a href="{{ route('reports.project_index') }}">{{ __('dboard.show') }}</a></x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('works.index')
</x-app-layout>
