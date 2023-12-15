<table class="min-w-full divide-y divide-default-200">
    <thead class="bg-default-100">
    <tr>
        @foreach($columns as $column => $value)
            <th scope="col" class="px-6 py-4 text-start whitespace-nowrap text-sm font-medium text-default-500">
                {{ $value }}
                @if($column !== "delete")
                    <i data-lucide="arrow-down-up" class="w-4 h-4 inline-flex align-middle text-default-500"></i>
                @endif
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody class="divide-y divide-default-200">
    @foreach($data as $row)
        <tr>
            @foreach($columns as $column => $value)
                <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $row->{$column} }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>

    {{ $data->links() }}
</table>
