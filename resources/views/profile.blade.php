<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="pb-2 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <div class="grid grid-rows-3 grid-flow-col gap-4">
                        <div class="row-span-3">
                            <h2 class="pl-2 mb-4 text-2xl leading-7  text-gray-400">Your Profile</h2>
                            <img src="/images/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%;" class="mx-4">
                        </div>
                        <div class="col-span-2">
                            <dl>
                                <div class="flex flex-row">
                                    <div class="flex-1 w-50 pr-4">
                                        <div class="border-b border-gray-200 pt-4 pl-2">
                                            <dt class="font-medium">Name</dt>
                                            <dd class="mt-2 mb-2 text-sm text-gray-500">{{ auth()->user()->name }}</dd>
                                        </div>
                                    </div>
                                    <div class="flex-1 w-50 ">
                                        <div class="border-b border-gray-200 pt-4 pl-2">
                                            <dt class="font-medium text-gray-900">Email</dt>
                                            <dd class="mt-2 mb-2 text-sm text-gray-500">{{ auth()->user()->email }}</dd>
                                        </div>
                                    </div>
                            </div>
                            </dl>
                        </div>

                        <div class="col-span-2">
                            <div class="float-left w-50 py-4">
                                <form enctype="multipart/form-data" action="{{'profile.update_avatar'}}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <label for="avatar" class="block text-sm font-medium mb-2">Update Profile Image</label>
                                    <input type="file" name="avatar" class="border py-2 block w-50 pl-2 pr-12 sm:text-sm rounded-md">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 fl-l mt-2">
                                        <x-button type="submit" >Submit</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <x-button ><a href="{{ route('dashboard') }}"> Back</a></x-button>
                        </div>

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
                    <h2 class="pl-2 mb-2 text-2xl leading-7  text-gray-400">Edit Your Profile</h2>
                    <form method="POST" action="{{'profile.update'}}">
                        @method('PUT')
                        @csrf
                    <div class="flex flex-row">
                    <div class="flex-1 w-50 px-2">
                        <label for="name" class="block text-sm font-medium">Name, Surname</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="name" id="name" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md" value="{{ auth()->user()->name }}" autofocus>
                        </div>
                    </div>
                    <div class="flex-1 w-50 px-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="email" id="email" class="border py-2  block w-full pl-2 pr-12 sm:text-sm rounded-md" value="{{ auth()->user()->email }}" autofocus>
                        </div>
                    </div>
                </div>
                    <div class="flex flex-row">
                    <div class="flex-1 w-50 px-2 mt-4">
                        <label for="new_password" class="block text-sm font-medium">Enter New Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password" id="new_password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="flex-1 w-50 px-4 mt-4">
                        <label for="confirm_password" class="block text-sm font-medium">Retype Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password_confirmation" id="confirm_password" class="border py-2 block w-full pl-2 pr-12 sm:text-sm rounded-md" autocomplete="confirm-password">
                        </div>
                    </div>
                    </div>
                    <x-button class="mt-4">{{ __('Update') }}</x-button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
