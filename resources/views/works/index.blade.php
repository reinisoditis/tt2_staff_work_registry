<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-success-message></x-success-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200">
                    <h2 class=" mb-4 text-xl leading-7 text-gray-700">{{ __('work.title') }}</h2>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden  sm:rounded-lg">
                                        <table class="hover:min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed" >
                                                <tr>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.from') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.to') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.tsim') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.comment') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.pjname') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.wtname') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.edit') }}
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        {{ __('crud.delete') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($works as $work)
                                                <tr>
                                                    <td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->from }}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->to }}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->time_spent_min }}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->comment }}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->project_name}}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{ $work->worktype_name}}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('works.edit', $work->id) }}">{{ __('crud.edit') }}</a>
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        <form action="{{ action([App\Http\Controllers\WorkController::class, 'destroy'], $work->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-indigo-900">{{ __('crud.delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $works->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</div>




