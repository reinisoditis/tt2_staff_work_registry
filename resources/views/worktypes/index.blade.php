<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Work Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                                    <table>
                                        <thead>
                                        <tr class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <th scope="col" class="text-gray-500 uppercase tracking-wider ">
                                                Name
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="">
                                        @foreach ($worktypes as $worktype)
                                        <tr class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $worktype->name }}
                                                <button type="button" onclick="{{ route('worktypes.index', $worktype) }}" class="ta-left">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="mt-4">
                                {{ $worktypes->links() }}
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
