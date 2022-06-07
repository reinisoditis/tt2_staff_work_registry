<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-success-message></x-success-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200">
                    <h2 class=" mb-4 text-xl leading-7 text-gray-700">Your Work Reports</h2>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden  sm:rounded-lg">
                                        <table class="hover:min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed" >
                                                <tr>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Id
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        From
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        To
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Time spent in min
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Comment
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Project Name
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Worktype Name
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Edit
                                                    </th>
                                                    <th scope="col" class="border text-xs font-medium text-gray-500  uppercase">
                                                        Delete
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($works as $work)
                                                <tr>
                                                    <td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        {{$loop->iteration}}
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
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
                                                        <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('works.edit', $work->id) }}"> Edit</a>
                                                    </td><td class="border px-6 py-4 text-xs text-gray-500 ">
                                                        <form action="{{ action([App\Http\Controllers\WorkController::class, 'destroy'], $work->id) }}" method="POST">
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
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</div>




