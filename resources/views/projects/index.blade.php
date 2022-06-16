<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('project.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message></x-success-message>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <x-error-message></x-error-message>
                                @can('projects.create')
                                <x-button class="mb-4"><a href="{{ route('projects.create') }}">{{ __('project.crp') }}</a></x-button>
                                @endcan
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed">
                                            <tr>
                                                <th scope="col" class="border text-lg font-medium text-gray-500 uppercase ">
                                                    {{ __('crud.name') }}
                                                </th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500 uppercase">
                                                    {{ __('crud.status') }}
                                                </th>
                                               <th colspan="2" class="border"></th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($projects as $project)
                                            <tr>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                                    {{ $project->name }}
                                                </td>

                                                    @if ($project->status == 1) <td class="border px-6 py-4 whitespace-nowrap text-sm text-center text-green-600 uppercase">
                                                        {{ __('crud.active') }}
                                                    </td>
                                                    @else <td class="border px-6 py-4 whitespace-nowrap text-sm text-center text-red-600 uppercase">
                                                        {{ __('crud.inactive') }}
                                                    </td>
                                                    @endif
                                                <td colspan="2" class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="flex flex-row justify-center">
                                                        @can('projects.edit')
                                                            <a type="button" href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 px-4">{{ __('crud.edit') }}</a>
                                                        @endcan
                                                        @can('projects.delete')
                                                            <form action="{{ action([App\Http\Controllers\ProjectController::class, 'destroy'], $project->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 hover:text-indigo-900">{{ __('crud.delete') }}</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                    {{ $projects->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
