<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('user.addnew') }}
        </h2>
    </x-slot>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-error-message></x-error-message>
                        <x-button class="mb-2"><a href="{{ route('users.index') }}">{{ __('crud.back') }}</a></x-button>
                        <div class="flex flex-row mt-4">
                            <div class="flex-1 px-2">
                                <label for="name" class="block text-sm font-medium">{{ __('crud.namesurname') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="name" id="name" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class="flex-1 px-4">
                                <label for="email" class="block text-sm font-medium">{{ __('crud.email') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="email" id="email" class="border py-2  block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                        </div>
                            <div class="flex flex-row">
                            <div class="flex-1 px-2 mt-4">
                                <label for="password" class="block text-sm font-medium">{{ __('crud.enpassword') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="password" name="password" id="password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                            <div class="flex-1 px-4 mt-4">
                                <label for="confirm_password" class="block text-sm font-medium">{{ __('crud.rtpassword') }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="password" name="password_confirmation" id="confirm_password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md">
                                </div>
                            </div>
                            </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                        <x-button type="submit" class="mt-4">{{ __('crud.submit') }}</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</x-app-layout>
