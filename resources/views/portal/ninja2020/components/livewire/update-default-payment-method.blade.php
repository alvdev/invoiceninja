<div class="mt-4 mb-4 bg-white shadow sm:rounded-lg">
    <div class="">
        <div class="sm:flex sm:items-start sm:justify-between">
            <div>
                <h3 class="text-2xl">
                    {{ ctrans('texts.default_payment_method_label') }}
                </h3>
                <div class="max-w-xl mt-2 text-sm leading-5 text-gray-500 flex items-center">
                    <span class="text-primary mr-1 hidden" data-ref="success-label">{{ ctrans('texts.success') }}!</span>

                    <p>
                        {{ $token->is_default ? ctrans('texts.already_default_payment_method') : ctrans('texts.default_payment_method') }}
                    </p>
                </div>
            </div>
            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                <form wire:submit.prevent="makeDefault">
                    <button class="button button-primary bg-primary whitespace-nowrap"
                        {{ $token->is_default ? 'disabled' : '' }}>
                        {{ ctrans('texts.save_as_default') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
