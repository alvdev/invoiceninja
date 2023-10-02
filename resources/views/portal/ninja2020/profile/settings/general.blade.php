    <div class="mt-8">
        <div>
            <div class="md:col-span-1">
                <div class="sm:px-0">
                    <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{ ctrans('texts.contact_details') }}</h3>
                </div>
            </div> <!-- End of left-side -->

            <div class="mt-8">
                <form wire:submit.prevent="submit" id="update_client">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-8">
                        <div class="col-span-6 sm:col-span-3 relative">
                            <label for="first_name"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.first_name')</label>
                            <input id="contact_first_name"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('contact_first_name', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                                name="first_name" wire:model.defer="first_name" />
                            @error('first_name')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3 relative">
                            <label for="last_name"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.last_name')</label>
                            <input id="contact_last_name"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('contact_last_name', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                                name="last_name" wire:model.defer="last_name" />
                            @error('last_name')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3 relative">
                            <label for="email_address"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.email_address')</label>
                            <input id="contact_email_address"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('contact_email', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                                type="email" name="email" wire:model.defer="email" />
                            @error('email')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3 relative">
                            <label for="contact_phone"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.phone')</label>
                            <input id="contact_phone"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                                name="phone" wire:model.defer="phone" />
                            @error('phone')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3 relative">
                            <label for="contact_password"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.password')</label>
                            <input id="contact_password"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                                name="password" wire:model.defer="password" type="password" />
                            @error('password')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3 relative">
                            <label for="contact_password_confirmation"
                                class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.confirm_password')</label>
                            <input id="contact_password_confirmation"
                                class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                                name="password_confirmation" wire:model.defer="password_confirmation" type="password" />
                            @error('password_confirmation')
                                <div class="validation validation-fail">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-8 text-right">
                        <button data-ref="update-contact-details"
                            class="button button-primary bg-primary">{{ $saved }}</button>
                    </div>
                </form>
            </div> <!-- End of main form -->
        </div>
    </div>
