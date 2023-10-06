<div class="text-xl py-2 sm:grid sm:grid-cols-2 sm:gap-4">
    <dt class="text-gray-500">
        {{ ctrans('texts.subtotal') }}
    </dt>

    <dd class="text-gray-900">
        {{ App\Utils\Number::formatMoney($total['invoice_totals'], $client) }}
    </dd>

    @if($total['fee_total'] > 0)
        <dt class="text-gray-500">
            {{ ctrans('texts.gateway_fees') }}
        </dt>

        <dd class="text-gray-900">
            {{ App\Utils\Number::formatMoney($total['fee_total'], $client) }}
        </dd>
    @endif

    @if($total['credit_totals'] > 0)
        <dt class="text-gray-500">
            {{ ctrans('texts.credit_amount') }}
        </dt>

        <dd class="text-gray-900">
            {{ App\Utils\Number::formatMoney($total['credit_totals'], $client) }}
        </dd>
    @endif

    <dt class="text-gray-500">
        {{ ctrans('texts.amount_due') }}
    </dt>
    
    <dd class="text-gray-900">
        {{ App\Utils\Number::formatMoney($total['amount_with_fee'], $client) }}
    </dd>
</div>
