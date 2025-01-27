@extends('portal.ninja2020.layout.app')

@isset($gateway_title)
    @section('meta_title', $gateway_title)
@else
    @section('meta_title', ctrans('texts.pay_now'))
@endisset

@push('head')
    @yield('gateway_head')
@endpush

@section('body')
    @livewire('required-client-info', ['fields' => method_exists($gateway, 'getClientRequiredFields') ? $gateway->getClientRequiredFields() : [], 'contact' => auth()->guard('contact')->user(), 'countries' => $countries, 'company' => $company, 'company_gateway_id' => $gateway->company_gateway ? $gateway->company_gateway->id : $gateway->id])

    <div class="container pointer-events-none" data-ref="gateway-container">
        {{-- @isset($card_title)
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ $card_title }}
            </h3>
        @endisset --}}

        @isset($card_description)
            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                {{ $card_description }}
            </p>
        @endisset
        <div>
            @yield('gateway_content')
        </div>

        @if(Request::isSecure())
            <span class="my-4 text-xs inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <span class="ml-1">Secure 256-bit encryption</span>
            </span>
        @endif
    </div>
@endsection

@push('footer')
    @yield('gateway_footer')

    <script>
        Livewire.on('passed-required-fields-check', () => {
            document.querySelector('div[data-ref="required-fields-container"]').classList.add('opacity-25');
            document.querySelector('div[data-ref="required-fields-container"]').classList.add('pointer-events-none');

            document.querySelector('div[data-ref="gateway-container"]').classList.remove('opacity-25');
            document.querySelector('div[data-ref="gateway-container"]').classList.remove('pointer-events-none');

            document
                .querySelector('div[data-ref="gateway-container"]')
                .scrollIntoView({behavior: "smooth"});
        });

        Livewire.on('update-shipping-data', (event) => {
            for (field in event) {
                let element = document.querySelector(`input[name=${field}]`);

                if (element) {
                    element.value = event[field];
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            let toggleWithToken = document.querySelector('.toggle-payment-with-token');
            let toggleWithCard = document.querySelector('#toggle-payment-with-credit-card');

            if (toggleWithToken) {
                toggleWithToken.click();
            } else if (toggleWithCard) {
                toggleWithCard.click();
            }
        });
    </script>
@endpush
