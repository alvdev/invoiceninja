<div class="mt-8">
    <div>
        <div class="md:col-span-1">
            <div class="sm:px-0">
                <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{ ctrans('texts.billing_address') }}</h3>
            </div>
        </div>

        <div class="mt-8">
            <form wire:submit.prevent="submit" method="POST" id="update_billing_address">
                @csrf
                <div class="grid grid-cols-6 gap-8">
                    <div class="col-span-6 relative">
                        <label for="address1"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.address1') }}</label>
                        <input id="address1"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('billing_address1', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            name="address1" wire:model.defer="address1" />
                        @error('address1')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="address2"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.address2') }}</label>
                        <input id="address2"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('billing_address2', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            name="address2" wire:model.defer="address2" />
                        @error('address2')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="city"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.city') }}</label>
                        <input id="city"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('billing_city', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            name="city" wire:model.defer="city" />
                        @error('city')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-2 relative">
                        <label for="state"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.state') }}</label>
                        <input id="state"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('billing_state', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            name="state" wire:model.defer="state" />
                        @error('state')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-2 relative">
                        <label for="postal_code"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.postal_code') }}</label>
                        <input id="postal_code"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 {{ in_array('billing_postal_code', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            name="postal_code" wire:model.defer="postal_code" />
                        @error('postal_code')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-2 relative">
                        <label for="country"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.country')</label>
                        <select id="country"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 form-select rounded-none {{ in_array('billing_country', (array) session('missing_required_fields')) ? 'ring-4 ring-red-400' : '' }}"
                            wire:model.defer="country_id">
                            <option value="none"></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->iso_3166_2 }} ({{ $country->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('country')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-8 text-right">
                    <button class="button button-primary bg-primary">{{ $saved }}</button>
                </div>
        </div>
        </form>
    </div>
</div>
