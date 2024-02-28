<table class="min-w-full divide-y divide-default-200" id="my_table">
    <thead class="bg-default-100">
    <tr>
        @foreach($columns as $column => $value)
            <th scope="col"
                class="group px-6 py-4 text-start whitespace-nowrap text-sm font-medium text-default-500 hover:text-primary-500 cursor-pointer">
                {{ $value }}
                @if($column !== "delete")
                    <i class="icon-table fas fa-arrows-alt-v w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
                    <i class="icon-table fas fa-arrow-up hidden w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
                    <i class="icon-table fas fa-arrow-down hidden w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
                @endif
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody class="divide-y divide-default-200">
    @foreach($data as $row)
        <tr>
            @foreach($columns as $column => $value)
                @if($column !== "delete")
                    <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $row->{$column} }}</td>
                @else
                    <td class="px-6 py-4">
                        <x-forms.buttons data-url="{{ $deleteUrl }}" data-id="{{ $row->id }}"
                                         class="p-2 !bg-error-500 hover:!bg-error-300 btn-delete">{{ __("Delete") }}</x-forms.buttons>
                    </td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
<div>
    {{ $data->links() }}
</div>
