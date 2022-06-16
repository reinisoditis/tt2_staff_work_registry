<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('work.ew') }}
        </h2>
    </x-slot>

<form action="{{ route('works.update',$work->id) }}" method="POST">
     @csrf
     @method('PUT')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('dashboard') }}">{{ __('crud.back') }}</a></x-button>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="project_id" class="block text-sm font-medium">{{ __('crud.pjname') }}</label>
                                <div class="mt-1">
                                    <select name="project_id" id="project_id"   class="relative rounded-md shadow-sm border py-2 block w-full pl-2 pr-12 sm:text-sm">
                                        @foreach ($projects as $project)
                                            <option value={{$project->id}} @if($project->id==$work->project_id) selected @endif>{{ $project->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="flex-1 w-50 px-4">
                                <label for="worktype_id" class="block text-sm font-medium">{{ __('crud.wtname') }}</label>
                                <div class="mt-1">
                                    <select name="worktype_id" id="worktype_id" class="relative rounded-md shadow-sm border py-2 block w-full pl-2 pr-12 sm:text-sm">
                                        @foreach ($worktypes as $worktype)
                                            <option value={{$worktype->id}} @if($worktype->id==$work->worktype_id) selected @endif>{{ $worktype->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="from" class="block text-sm font-medium">{{ __('crud.dwstw') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="datetime-local" name="from" value="{{ date('Y-m-d\TH:i', strtotime($work->from)) }}" id="from" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class="flex-1 w-50 px-4">
                                <label for="to" class="block text-sm font-medium">{{ __('crud.dwftw') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="datetime-local" name="to" id="to" value="{{ date('Y-m-d\TH:i', strtotime($work->to)) }}" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row py-2">
                            <div class="flex-1 w-50 px-4">
                                <label for="comment" class="block text-sm font-medium">{{ __('crud.comment') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <textarea id="comment" name="comment" rows="3"
                                    class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">{{ $work->comment }}</textarea>
                                </div>
                            </div>
                            <div class="flex-1 w-25 px-4">
                                <label for="time_spent_min" class="block text-sm font-medium">{{ __('crud.tsatwim') }}</label>
                                <div class="mt-1">
                                <input type="number" min="1" id="time_spent_min" value="{{ $work->time_spent_min }}" name="time_spent_min"class="relative rounded-md shadow-sm border py-2 block pl-2 pr-2 sm:text-sm rounded-md">
                            </div>
                        </div>
                      </div>
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
                        <x-button type="submit" >{{ __('crud.submit') }}</x-button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</x-app-layout>
