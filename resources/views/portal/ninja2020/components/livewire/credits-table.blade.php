<div>
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full overflow-hidden rounded">
            <table class="min-w-full mt-4 credits-table">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left uppercase border-b-2 border-gray-200">
                            <span role="button" wire:click="sortBy('number')" class="cursor-pointer">
                                {{ ctrans('texts.credit_number') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" wire:click="sortBy('amount')" class="cursor-pointer">
                                {{ ctrans('texts.amount') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" wire:click="sortBy('balance')" class="cursor-pointer">
                                {{ ctrans('texts.balance') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" wire:click="sortBy('date')" class="cursor-pointer">
                                {{ ctrans('texts.credit_date') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" wire:click="sortBy('public_notes')" class="cursor-pointer">
                                {{ ctrans('texts.notes') }}
                            </span>
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-200"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($credits as $credit)
                        <tr class="bg-white group hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ $credit->number }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ App\Utils\Number::formatMoney($credit->amount, $credit->client) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ App\Utils\Number::formatMoney($credit->balance, $credit->client) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ $credit->translateDate($credit->date, $credit->client->date_format(), $credit->client->locale()) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ $credit->public_notes }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                <a href="{{ route('client.credit.show', $credit->hashed_id) }}"
                                    class="button-link text-primary">
                                    @lang('texts.view')
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white group hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500" colspan="100%">
                                {{ ctrans('texts.no_results') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center md:justify-between mt-16 mb-6">
        @if ($credits->total() > 0)
            <span class="text-gray-700 text-sm hidden md:block">
                {{ ctrans('texts.showing_x_of', ['first' => $credits->firstItem(), 'last' => $credits->lastItem(), 'total' => $credits->total()]) }}
            </span>
        @endif
        {{ $credits->links('portal/ninja2020/vendor/pagination') }}
        <div class="flex items-center">
            <span class="mr-2 text-sm hidden md:block">{{ ctrans('texts.per_page') }}</span>
            <select wire:model="per_page" class="form-select py-1 text-sm">
                <option>5</option>
                <option selected>10</option>
                <option>15</option>
                <option>20</option>
            </select>
        </div>
    </div>
</div>
