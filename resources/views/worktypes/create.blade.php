<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create WorkType') }}
        </h2>
    </x-slot>

<form action="{{ route('worktypes.store') }}" method="POST">
     @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('worktypes.index') }}"> Back</a></x-button>
                        <label for="name" class="block text-lg font-medium text-gray-700 py-2 uppercase">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <input type="text" name="name" id="name" class="border py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="WorkType Name">
                          <div class="absolute inset-y-0 right-0 flex items-center">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <x-button type="submit" class="mt-4">Submit</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</x-app-layout>
