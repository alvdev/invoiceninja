<div class="mt-8">
    <div>
        <div class="md:col-span-1">
            <div class="sm:px-0">
                <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{ ctrans('texts.shipping_address') }}</h3>
            </div>
        </div>

        <div class="mt-8">
            <form wire:submit.prevent="submit" method="POST" id="update_shipping_address">
                @csrf
                <div class="grid grid-cols-6 gap-8 relative">
                    <div class="col-span-6">
                        <label for="shipping_address1"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.shipping_address1') }}</label>
                        <input id="shipping_address1"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="shipping_address1" wire:model.defer="shipping_address1" />
                        @error('shipping_address1')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="shipping_address2"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.shipping_address2')</label>
                        <input id="shipping_address2"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="shipping_address2" wire:model.defer="shipping_address2" />
                        @error('shipping_address2')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="shipping_city"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.shipping_city')</label>
                        <input id="shipping_city"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="shipping_city" wire:model.defer="shipping_city" />
                        @error('shipping_city')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-2 relative">
                        <label for="shipping_state"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm leading-snug">@lang('texts.shipping_state')</label>
                        <input id="shipping_state"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="shipping_state" wire:model.defer="shipping_state" />
                        @error('shipping_state')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-2 relative">
                        <label for="shipping_postal_code"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.shipping_postal_code')</label>
                        <input id="shipping_postal_code"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="shipping_postal_code" wire:model.defer="shipping_postal_code" />
                        @error('shipping_postal_code')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2 relative">
                        <label for="shipping_country"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">@lang('texts.shipping_country')</label>
                        <select id="shipping_country"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 form-select rounded-none"
                            wire:model.defer="shipping_country_id">
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
                    <button class="button button-primary bg-primary whitespace-nowrap">
                        {{ $saved }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
