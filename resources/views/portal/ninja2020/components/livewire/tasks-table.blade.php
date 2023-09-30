<div>
    <div class="flex items-center justify-between">
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
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full overflow-hidden rounded">
            <table class="min-w-full mt-4 credits-table">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left uppercase border-b-2 border-gray-200">
                            <span role="button" wire:click="sortBy('description')" class="cursor-pointer">
                                {{ ctrans('texts.description') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-semibold leading-4 tracking-wider text-left uppercase border-b-2 border-gray-200">
                            <span role="button" wire:click="sortBy('description')" class="cursor-pointer">
                                {{ ctrans('texts.project') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" wire:click="sortBy('status_id')" class="cursor-pointer">
                                {{ ctrans('texts.status') }}
                            </span>
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs leading-4 font-semibold uppercase tracking-wider">
                            <span role="button" class="cursor-pointer">
                                {{ ctrans('texts.duration') }}
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr class="bg-white group hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ \Illuminate\Support\Str::limit($task->description, 80) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ $task->project?->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ $task->status?->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-500">
                                {{ \Carbon\CarbonInterval::seconds($task->calcDuration())->cascade()->forHumans() }}
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
        @if ($tasks->total() > 0)
            <span class="text-gray-700 text-sm hidden md:block">
                {{ ctrans('texts.showing_x_of', ['first' => $tasks->firstItem(), 'last' => $tasks->lastItem(), 'total' => $tasks->total()]) }}
            </span>
        @endif
        {{ $tasks->links('portal/ninja2020/vendor/pagination') }}
    </div>
</div>
