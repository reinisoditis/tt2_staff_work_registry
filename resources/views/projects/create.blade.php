<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

<form action="{{ route('projects.store') }}" method="POST">
     @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('projects.index') }}"> Back</a></x-button>
                        <label for="name" class="block text-lg font-medium text-gray-700 py-2 uppercase">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <input type="text" name="name" id="name" class="border py-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-500 block w-full pl-2 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Project Name">
                          <div class="absolute inset-y-0 right-0 flex items-center">
                          </div>
                        </div>
                        <div class="py-2">
                        <label for="status" class="sr-only">Status</label>
                        <select id="status" name="status" class="border focus:ring-indigo-500 focus:border-indigo-500 h-full py-2 pl-2 pr-7 bg-transparent text-gray-500 sm:text-sm rounded-md">
                          <option value=1>Active</option>
                          <option value=0>Inactive</option>
                        </select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <x-button type="submit" >Submit</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</x-app-layout>
