<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            Update your account's profile information and email address.
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="post" action="{{ route('profile.store') }}">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Profile Photo -->

                                    <!-- Name -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            Name
                                        </label>

                                        <input class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300"
                                            id="name" type="text" autocomplete="off" name ="name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="email">
                                            Email
                                        </label>

                                        <input class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300" id="email"
                                            type="email" name ="email" value="{{ $user->email }}">
                                        @error('email')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="phone">
                                            Phone Number
                                        </label>
                                        <input class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300" id="phone"
                                            type="text" name ="phone" value="{{ $user->phone }}">
                                        @error('phone')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <div class="text-sm text-green-600 mr-3 @if(!session()->has('message') ) hidden  @endif ">
                                    {{@session('message')}}
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>


            <div class="mt-10 sm:mt-0">
                <div wire:id="Fl9zHheReYhaAPuyp14D" class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Update Password</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form  method="post" action="{{ route('profile.password') }}">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700"
                                                for="current_password">
                                                Current Password
                                            </label>

                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300"
                                                id="current_password" type="password" name="current_password">
                                            {{-- {{!! $errors !!}} --}}
                                            @error('current_password')
                                                <div class="text-sm text-red-600">{{ $message }}</div>
                                            @enderror
                                            @error('same_password')
                                                <div class="text-sm text-red-600">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="password">
                                                New Password
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300"
                                                id="password" type="password" name="new_password"/>

                                            @error('new_password')
                                                <div class="text-sm text-red-600">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <div class="text-sm text-green-600 mr-3 @if(!session()->has('password_message') ) hidden  @endif ">
                                        {{@session('password_message')}}
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                <div wire:id="AzIwm7iF1G6M0ZLXSkzG" class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Delete Account</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Permanently delete your account.
                            </p>
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl text-sm text-gray-600">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Before deleting your account, please download any data or information that you wish to
                                retain.
                            </div>

                            <div class="mt-5">
                                <button type="button"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                                    wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                                    Delete Account
                                </button>

                            </div>

                            <!-- Delete User Confirmation Modal -->
                            <div x-data="{
show: window.Livewire.find('AzIwm7iF1G6M0ZLXSkzG').entangle('confirmingUserDeletion') ,
focusables() {
// All focusable element types...
let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

return [...$el.querySelectorAll(selector)]
// All non-disabled elements...
.filter(el => ! el.hasAttribute('disabled'))
},
firstFocusable() { return this.focusables()[0] },
lastFocusable() { return this.focusables().slice(-1)[0] },
nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
}" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
                                x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show"
                                id="36ac91a8122577c7b197539ebb1a5123"
                                class="fixed top-0 inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center"
                                style="display: none;">
                                <div x-show="show" class="fixed inset-0 transform transition-all"
                                    x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0" style="display: none;">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <div x-show="show"
                                    class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    style="display: none;">
                                    <div class="px-6 py-4">
                                        <div class="text-lg">
                                            Delete Account
                                        </div>

                                        <div class="mt-4">
                                            Are you sure you want to delete your account? Once your account is deleted,
                                            all of its resources and data will be permanently deleted. Please enter your
                                            password to confirm you would like to permanently delete your account.

                                            <div class="mt-4" x-data="{}"
                                                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                                <input class="form-input rounded-md shadow-sm mt-1 block w-3/4"
                                                    type="password" placeholder="Password" x-ref="password"
                                                    wire:model.defer="password" wire:keydown.enter="deleteUser"
                                                    style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">



                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-6 py-4 bg-gray-100 text-right">
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                                            wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                                            Nevermind
                                        </button>


                                        <button type="button"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150 ml-2"
                                            wire:click="deleteUser" wire:loading.attr="disabled">
                                            Delete Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
