<div class="mt-8">
    <div>
        <div class="md:col-span-1">
            <div class="sm:px-0">
                <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{ ctrans('texts.client_details') }}</h3>
            </div>
        </div> <!-- End of left side -->

        <div class="mt-8">
            <form wire:submit.prevent="submit" method="POST" id="update_contact">
                @csrf
                <div class="grid grid-cols-6 gap-8">
                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="client_name"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.name') }}</label>
                        <input id="client_name"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="name" wire:model.defer="name" />
                        @error('name')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="client_vat_number"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.vat_number') }}</label>
                        <input id="client_vat_number"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="vat_number" wire:model.defer="vat_number" />
                        @error('vat_number')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="client_phone"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.phone') }}</label>
                        <input id="client_phone"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="phone" wire:model.defer="phone" />
                        @error('phone')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 relative">
                        <label for="client_website"
                            class="input-label absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.website') }}</label>
                        <input id="client_website"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            name="website" wire:model.defer="website" />
                        @error('website')
                            <div class="validation validation-fail">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-8 text-right">
                    <button class="button button-primary bg-primary whitespace-nowrap">{{ $saved }}</button>
                </div>
            </form>
        </div> <!-- End of right side -->
    </div>
</div>
