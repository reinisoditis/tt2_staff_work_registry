<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('worktypes.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-success-message></x-success-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <x-error-message></x-error-message>
                                @can('worktypes.create')
                                    <x-button class="mb-4"><a href="{{ route('worktypes.create') }}">{{ __('worktypes.crwt') }}</a></x-button>
                                @endcan
                                    <div class="shadow overflow-hidden  sm:rounded-lg">
                                        <table class="hover:min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed" >
                                            <tr>
                                                <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                    {{ __('crud.name') }}
                                                </th>
                                                <th scope="col" class="border">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($worktypes as $worktype)
                                            <tr>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $worktype->name }}
                                                </td>
                                                <td  class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="flex flex-row justify-center">
                                                        @can('worktypes.edit')
                                                            <a class="text-indigo-600 hover:text-indigo-900 px-4" href="{{ route('worktypes.edit', $worktype->id) }}">{{ __('crud.edit') }}</a>
                                                        @endcan
                                                        @can('worktypes.delete')
                                                            <form action="{{ action([App\Http\Controllers\WorkTypeController::class, 'destroy'], $worktype->id) }}" method="POST">
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
                                {{ $worktypes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



