<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('user.title') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message></x-success-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="pl-7 mt-4"><x-error-message></x-error-message></div>
                    <h2 class=" pl-7 mt-4 text-2xl leading-7  text-gray-400">{{ __('user.admin') }}</h2>
                        <div class="p-6 bg-white  border-gray-200">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden  sm:rounded-lg">
                                                <table class="hover:min-w-full w-full">
                                                    <thead class="bg-gray-50 table-fixed" >
                                                    <tr>
                                                        <th scope="col" class="border"></th>
                                                        <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                            {{ __('crud.name') }}
                                                        </th>
                                                        <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                            {{ __('crud.email') }}
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($admins as $admin)
                                                    <tr>
                                                        <td class="border pl-4">
                                                            <img src="images/avatars/{{ $admin->avatar }}" style="width:40px; height:40px; border-radius:50%;" class="mr-2">
                                                        </td>
                                                        <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                            {{ $admin->name }}
                                                        </td>
                                                        <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                            {{ $admin->email }}
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


                <h2 class=" pl-7 mt-4 text-2xl leading-7  text-gray-400">{{ __('user.pr') }}</h2>
                <div class="p-6 bg-white  border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden  sm:rounded-lg">
                                        <table class="hover:min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed" >
                                            <tr>
                                                <th scope="col" class="border"></th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                    {{ __('crud.name') }}
                                                </th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                    {{ __('crud.email') }}
                                                </th>
                                                <th scope="col" class="border">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($projectManagers as $pm)
                                            <tr>
                                                <td class="border pl-4">
                                                    <img src="images/avatars/{{ $pm->avatar }}" style="width:40px; height:40px; border-radius:50%;" class="mr-2">
                                                </td>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $pm->name }}
                                                </td>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $pm->email }}
                                                </td>
                                                <td  class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="flex flex-row justify-center">
                                                        @can('projectmanager.edit')
                                                        <a class="text-indigo-600 hover:text-indigo-900 px-4" href="{{ route('users.edit', $pm->id) }}">{{ __('crud.edit') }}</a>
                                                        @endcan
                                                        @can('projectmanager.delete')
                                                        <form action="{{ action([App\Http\Controllers\UserController::class, 'destroy'], $pm->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-indigo-900">{{ __('crud.delete') }}</button>
                                                        </form>
                                                        @endcan
                                                        @can('users.promote')
                                                        <a href="{{ route('users.demote', $pm->id)}}" class="text-green-600 hover:text-indigo-900 px-4">{{__('crud.demote')}}</a>
                                                        @endcan
                                                    </div>
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
                <h2 class=" pl-7 mt-4 text-2xl leading-7  text-gray-400">{{ __('user.nuser') }}</h2>
                <div class="p-6 bg-white  border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <x-button class="mb-4"><a href="{{ route('users.create') }}">{{ __('user.addnew') }}</a></x-button>
                                    <div class="shadow overflow-hidden  sm:rounded-lg">
                                        <table class="hover:min-w-full w-full">
                                            <thead class="bg-gray-50 table-fixed" >
                                            <tr>
                                                <th scope="col" class="border"></th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                    {{ __('crud.name') }}
                                                </th>
                                                <th scope="col" class="border text-lg font-medium text-gray-500  uppercase">
                                                    {{ __('crud.email') }}
                                                </th>
                                                <th scope="col" class="border">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($normalUsers as $user)
                                            <tr>
                                                <td class="border pl-4">
                                                    <img src="images/avatars/{{ $user->avatar }}" style="width:40px; height:40px; border-radius:50%;" class="mr-2">
                                                </td>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="border px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $user->email }}
                                                </td>
                                                <td  class="border px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <div class="flex flex-row justify-center">
                                                        <a class="text-indigo-600 hover:text-indigo-900 px-4" href="{{ route('users.edit', $user->id) }}">{{ __('crud.edit') }}</a>
                                                        <form action="{{ action([App\Http\Controllers\UserController::class, 'destroy'], $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-indigo-900">{{ __('crud.delete') }}</button>
                                                        </form>
                                                        @can('users.promote')
                                                        <a href="{{ route('users.promote', $user->id)}}" class="text-green-600 hover:text-indigo-900 px-4">{{__('crud.promote')}}</a>
                                                        @endcan
                                                    </div>
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
</x-app-layout>



