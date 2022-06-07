<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

<form action="{{ route('projects.update',$project->id) }}" method="POST">
     @csrf
     @method('PUT')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                       <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('projects.index') }}"> Back</a></x-button>
                        <label for="name" class="block text-lg font-medium text-gray-700 py-2 uppercase">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <input type="text" name="name" id="name" value="{{ $project->name }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 pr-12 py-2 text-gray-500 sm:text-sm border rounded-md" placeholder="WorkType Name">
                          <div class="absolute inset-y-0 right-0 flex items-center">
                          </div>
                        </div>
                        <div class="py-2">
                            <label for="status" class="sr-only">Status</label>
                            <select id="status" name="status" value="{{ $project->status }}" class="border focus:ring-indigo-500 focus:border-indigo-500 h-full py-2 pl-2 pr-7 bg-transparent text-gray-500 sm:text-sm rounded-md">

                              @if ($project->status == 1) {
                                <option value=1 selected="selected">Active</option>
                                <option value=0>Inactive</option>
                            }
                              @else {
                                <option value=1>Active</option>
                                <option value=0 selected="selected">Inactive</option>}
                              @endif
                            </select>
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
