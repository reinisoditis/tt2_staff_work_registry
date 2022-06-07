<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
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
                                <x-button class="mb-4"><a href="{{ route('projects.create') }}"> Create New Project</a></x-button>
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed">
                                            <tr>
                                                <th scope="col" class="border text-lg font-medium text-gray-500 uppercase ">
                                                    Name
                                                </th>
                                                <th scope="col" class="border text-lg border font-medium text-gray-500 uppercase">
                                                    Status
                                                </th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500 uppercase">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500 uppercase">
                                                    <span class="sr-only">Delete</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($projects as $project)
                                            <tr>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                                    {{ $project->name }}
                                                </td>

                                                    @if ($project->status == 1) <td class="border px-6 py-4 whitespace-nowrap text-sm text-center text-green-600 uppercase">
                                                        Active
                                                    </td>
                                                    @else <td class="border px-6 py-4 whitespace-nowrap text-sm text-center text-red-600 uppercase">
                                                        Inactive
                                                    </td>
                                                    @endif
                                                <td  class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a type="button" href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                                <td  class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <form action="{{ action([App\Http\Controllers\ProjectController::class, 'destroy'], $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                                    </form>
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
