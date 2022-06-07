<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Work') }}
        </h2>
    </x-slot>

<form action="{{ route('works.store') }}" method="POST">
     @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('dashboard') }}"> Back</a></x-button>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="project_id" class="block text-sm font-medium">Project</label>
                                <div class="mt-1">
                                    <select name="project_id" id="project_id" class="relative rounded-md shadow-sm border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                        @foreach ($projects as $project)
                                            <option value={{$project->id}}>{{ $project->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="flex-1 w-50 px-4">
                                <label for="worktype_id" class="block text-sm font-medium">Work Type</label>
                                <div class="mt-1">
                                    <select name="worktype_id" id="worktype_id" class="relative rounded-md shadow-sm border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                        @foreach ($worktypes as $worktype)
                                            <option value={{$worktype->id}}>{{ $worktype->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="from" class="block text-sm font-medium">Date When Started the Work</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="datetime-local" name="from" id="from" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class="flex-1 w-50 px-4">
                                <label for="to" class="block text-sm font-medium">Date When Finished the Work</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="datetime-local" name="to" id="to" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="comment" class="block text-sm font-medium">Comment</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <textarea id="comment" name="comment" rows="3"
                                    class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md"
                                    placeholder="Example Comment"></textarea>
                                </div>
                            </div>
                            <div class="flex-1 w-25 px-4">
                                <label for="time_spent_min" class="block text-sm font-medium">Time Spent At The Work</label>
                                <div class="mt-1">
                                <input type="number" min="1" id="time_spent_min" name="time_spent_min"class="relative rounded-md shadow-sm border py-2 block pl-2 pr-2 sm:text-sm rounded-md">
                            </div>
                        </div>
                      </div>
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
                        <x-button type="submit" >Submit</x-button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</x-app-layout>
