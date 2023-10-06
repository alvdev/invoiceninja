@extends('portal.ninja2020.layout.app')
@section('meta_title', ctrans('texts.pay_now'))

@push('head')
    <meta name="show-invoice-terms" content="{{ $settings->show_accept_invoice_terms ? true : false }}">
    <meta name="require-invoice-signature"
        content="{{ $client->user->account->hasFeature(\App\Models\Account::FEATURE_INVOICE_SETTINGS) && $settings->require_invoice_signature }}">
    <script src="{{ asset('vendor/signature_pad@2.3.2/signature_pad.min.js') }}"></script>
@endpush

@section('body')
    <form action="{{ route('client.payments.process') }}" method="post" id="payment-form"
        onkeypress="return event.keyCode != 13;">
        @csrf
        <input type="hidden" name="company_gateway_id" id="company_gateway_id">
        <input type="hidden" name="payment_method_id" id="payment_method_id">
        <input type="hidden" name="signature">
        <input type="hidden" name="pre_payment" value="{{ isset($pre_payment) ? $pre_payment : false }}">
        <input type="hidden" name="is_recurring" value="{{ isset($is_recurring) ? $is_recurring : false }}">
        <input type="hidden" name="frequency_id" value="{{ isset($frequency_id) ? $frequency_id : false }}">
        <input type="hidden" name="remaining_cycles" value="{{ isset($remaining_cycles) ? $remaining_cycles : false }}">

        <div class="container mx-auto">
            <div class="flex justify-between flex-row-reverse">
                <div class="flex justify-end mb-2 whitespace-nowrap">
                    @livewire('pay-now-dropdown', ['total' => $total, 'company' => $company])
                </div>

                @foreach ($invoices as $key => $invoice)
                    <input type="hidden" name="payable_invoices[{{ $key }}][invoice_id]"
                        value="{{ $invoice->hashed_id }}">
                    <div class="mb-4 overflow-hidden w-full">
                        <h3 class="text-4xl text-gray-900 flex items-center gap-4">
                            <span class="font-semibold">{{ ctrans('texts.invoice') }}</span>
                            <a class="button-link text-primary"
                                href="{{ route('client.invoice.show', $invoice->hashed_id) }}">
                                (#{{ $invoice->number }})
                            </a>
                        </h3>
                        <div class="mt-8">
                            <dl>
                                @if (!empty($invoice->number) && !is_null($invoice->number))
                                    <div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.invoice_number') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->number }}
                                        </dd>
                                    </div>
                                @endif

                                <div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
                                    @if ($invoice->po_number)
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.po_number') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->po_number }}
                                        </dd>
                                    @elseif($invoice->public_notes)
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.public_notes') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->public_notes }}
                                        </dd>
                                    @else
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.invoice_date') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->translateDate($invoice->date, $invoice->client->date_format(), $invoice->client->locale()) }}
                                        </dd>
                                    @endif
                                </div>

                                @if (!empty($invoice->due_date) && !is_null($invoice->due_date))
                                    <div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.due_date') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->translateDate($invoice->due_date, $invoice->client->date_format(), $invoice->client->locale()) }}
                                        </dd>
                                    </div>
                                @endif

                                @if ($settings->client_portal_allow_under_payment || $settings->client_portal_allow_over_payment)
                                    <div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.amount_due') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            {{ $invoice->client->currency()->code }}
                                            ({{ $invoice->client->currency()->symbol }})
                                            {{ $invoice->partial > 0 ? $invoice->partial : $invoice->balance }}
                                        </dd>
                                    </div>
                                @endif

                                @if (!empty($invoice->amount) && !is_null($invoice->amount))
                                    <div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
                                        <dt class="text-gray-500">
                                            {{ ctrans('texts.payment_amount') }}
                                        </dt>
                                        <dd class="text-gray-900">
                                            <!-- App\Utils\Number::formatMoney($invoice->amount, $invoice->client) -->
                                            <!-- Disabled input field don't send it's value with request. -->
                                            @if (!$settings->client_portal_allow_under_payment && !$settings->client_portal_allow_over_payment)
                                                <label>
                                                    {{ $invoice->client->currency()->code }}
                                                    ({{ $invoice->client->currency()->symbol }})

                                                    <input name="payable_invoices[{{ $key }}][amount]"
                                                        value="{{ $invoice->partial > 0 ? $invoice->partial : $invoice->balance }}"
                                                        class="text-gray-800" readonly />
                                                </label>
                                            @else
                                                <div class="flex items-center">
                                                    <label>
                                                        <span class="mt-2">{{ $invoice->client->currency()->code }}
                                                            ({{ $invoice->client->currency()->symbol }})</span>
                                                        <input type="text" class="input mt-0 mr-4 relative"
                                                            name="payable_invoices[{{ $key }}][amount]"
                                                            value="{{ $invoice->partial > 0 ? $invoice->partial : $invoice->balance }}" />
                                                    </label>
                                                </div>
                                            @endif

                                            @if ($settings->client_portal_allow_under_payment)
                                                <span
                                                    class="mt-1 text-sm text-gray-800">{{ ctrans('texts.minimum_payment') }}:
                                                    {{ $settings->client_portal_under_payment_minimum }}</span>
                                            @endif
                                        </dd>
                                    </div>
                                @endif
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (intval($total) == 0)
                <small>* {{ ctrans('texts.online_payments_minimum_note') }}</small>
            @endif
        </div>
    </form>

    @include('portal.ninja2020.invoices.includes.terms', [
        'entities' => $invoices,
        'entity_type' => ctrans('texts.invoice'),
    ])
    @include('portal.ninja2020.invoices.includes.signature')

@endsection

@push('footer')
    <script src="{{ asset('js/clients/invoices/payment.js') }}"></script>
@endpush
