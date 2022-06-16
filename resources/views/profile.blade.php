<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dboard.myprofile') }}
        </h2>
    </x-slot>

    <div class="pb-2 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <div class="grid grid-rows-4 grid-flow-col gap-4">
                        <div class="row-span-3">
                            <h2 class="pl-2 mb-4 text-2xl leading-7  text-gray-400">{{ __('dboard.yprofile') }}</h2>
                            <img src="/images/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%;" class="mx-4">
                        </div>
                        <div class="col-span-2">
                            <dl>
                                <div class="flex flex-row">
                                    <div class="flex-1 pr-4">
                                        <div class="border-b border-gray-200 pt-4 pl-2  w-44">
                                            <dt class="font-medium">{{ __('crud.name') }}</dt>
                                            <dd class="mt-2 mb-2 text-sm text-gray-500">{{ auth()->user()->name }}</dd>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="border-b border-gray-200 pt-4 pl-2 w-36">
                                            <dt class="font-medium text-gray-900">{{ __('crud.email') }}</dt>
                                            <dd class="mt-2 mb-2 text-sm text-gray-500">{{ auth()->user()->email }}</dd>
                                        </div>
                                    </div>
                                    <div class="flex-1 w-20 ">
                                        <div class="border-b border-gray-200 pt-4 ml-4 w-20">
                                            <dt class="font-medium text-gray-900">{{ __('dboard.role') }}</dt>
                                            <dd class="mt-2 mb-2 text-sm text-gray-500">
                                                @if (auth()->user()->role_id == 3)
                                                {{ __('dboard.admin') }}
                                                @elseif (auth()->user()->role_id == 2)
                                                {{ __('dboard.manager') }}
                                                @else
                                                {{ __('dboard.user') }}
                                                @endif
                                            </dd>
                                    </div>
                                    </div>
                            </div>
                            </dl>
                        </div>

                        <div class="col-span-2 row-span-2">
                            <div class="float-left w-56 py-4">
                                <form enctype="multipart/form-data" action="{{'profile.update_avatar'}}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <label for="avatar" class="block text-sm font-medium mb-2">{{ __('dboard.avatar') }}</label>
                                    <input type="file" name="avatar" class="border py-2 block w-50 pl-2 pr-12 sm:text-sm rounded-md">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 fl-l mt-2">
                                        <x-button type="submit" >{{ __('crud.submit') }}</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="mt-4 ml-6">
                        <x-button ><a href="{{ route('dashboard') }}">{{ __('crud.back') }}</a></x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-error-message></x-error-message>
                    <x-success-message></x-success-message>
                    <h2 class="pl-2 mb-4 text-2xl leading-7  text-gray-400">{{ __('dboard.editprofile') }}</h2>
                    <form method="POST" action="{{'profile.update'}}">
                        @method('PUT')
                        @csrf
                    <div class="flex flex-row">
                    <div class="flex-1 px-2">
                        <label for="name" class="block text-sm font-medium">{{ __('crud.namesurname') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="name" id="name" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md" value="{{ auth()->user()->name }}" autofocus>
                        </div>
                    </div>
                    <div class="flex-1 px-4">
                        <label for="email" class="block text-sm font-medium">{{ __('crud.email') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="email" id="email" class="border py-2  block w-full pl-2 pr-12 sm:text-sm rounded-md" value="{{ auth()->user()->email }}" autofocus>
                        </div>
                    </div>
                </div>
                    <div class="flex flex-row">
                    <div class="flex-1 px-2 mt-4">
                        <label for="new_password" class="block text-sm font-medium">{{ __('crud.enpassword') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password" id="new_password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                        </div>
                    </div>
                    <div class="flex-1 px-4 mt-4">
                        <label for="confirm_password" class="block text-sm font-medium">{{ __('crud.rtpassword') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password_confirmation" id="confirm_password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                        </div>
                    </div>
                    </div>
                    <x-button class="mt-4">{{ __('crud.update') }}</x-button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
