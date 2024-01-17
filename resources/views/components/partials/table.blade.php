<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    @if(isset($columns["delete"]))
    let urlDelete = null;
    let idDelete = 0;
    function deleteRow(rowNumber) {
        const table = document.getElementById("my_table");

        const rowToDelete = table.rows[rowNumber];

        if (rowToDelete) {
            table.deleteRow(rowToDelete.rowIndex);
        } else {
            console.warn("Row not found:", rowNumber);
        }
    }

    function someCallback() {
        const url = urlDelete + "/" + idDelete;
        console.log(url);

        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if(data === 0)
                    openDialog({message: "Id Does Not Exist, Please try again later", icon: "x"})
                else
                    deleteRow(idDelete);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function deleteRowInTable(url, id) {
        urlDelete = url;
        idDelete = id;
        openDialog({title: "", message :"Are you sure you want to delete ?", confirm: true, icon: "x", messageOk: "Delete", callback: someCallback});
    }
    @endif
</script>
<table class="min-w-full divide-y divide-default-200" id="my_table">
    <thead class="bg-default-100">
    <tr>
        @foreach($columns as $column => $value)
            <th scope="col" class="group px-6 py-4 text-start whitespace-nowrap text-sm font-medium text-default-500 hover:text-primary-500 cursor-pointer">
                {{ $value }}
                @if($column !== "delete")
                    <i data-lucide="arrow-down-up" class="w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
                    <i data-lucide="arrow-up" class="hidden w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
                    <i data-lucide="arrow-down" class="hidden w-4 h-4 inline-flex align-middle text-default-500 group-hover:text-primary-500"></i>
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
                    <td class="px-6 py-4"><x-forms.buttons onclick="deleteRowInTable('{{ $deleteUrl }}', '{{ $row->id }}')" class="p-2 !bg-error-500 hover:!bg-error-300">{{ __("Delete") }}</x-forms.buttons></td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
<div>
    {{ $data->links() }}
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const table = document.getElementById("my_table");
        const headers = Array.from(table.querySelectorAll("th")).filter(header => header.textContent.trim() !== "Delete");
        const nameColumn = headers.map(header => header.textContent.trim());
        let currentSortColumn = null;
        let currentSortDirection = null;
        let counter = 0;

        function updateSortIcons(header, direction) {
            const icon = header.querySelectorAll("svg");

            if(direction === "desc") {
                if(! icon[0].classList.contains("hidden"))
                    icon[0].classList.add("hidden");
                if(! icon[1].classList.contains("hidden"))
                    icon[1].classList.add("hidden");

                if(icon[2].classList.contains("hidden"))
                    icon[2].classList.remove("hidden");
            } else if(direction === "asc"){
                if(! icon[0].classList.contains("hidden"))
                    icon[0].classList.add("hidden");
                if(! icon[2].classList.contains("hidden"))
                    icon[2].classList.add("hidden");

                if(icon[1].classList.contains("hidden"))
                    icon[1].classList.remove("hidden");
            } else {
                console.log("check", direction)
                if(! icon[1].classList.contains("hidden"))
                    icon[1].classList.add("hidden");
                if(! icon[2].classList.contains("hidden"))
                    icon[2].classList.add("hidden");

                if(icon[0].classList.contains("hidden"))
                    icon[0].classList.remove("hidden");
            }
        }

        function sortTable(column, direction) {
            const rows = Array.from(table.querySelectorAll("tbody tr"));
            const columnIndex = nameColumn.indexOf(column);

            rows.sort((rowA, rowB) => {
                const valueA = rowA.cells[columnIndex].textContent.trim();
                const valueB = rowB.cells[columnIndex].textContent.trim();

                if (direction === "asc") {
                    return valueA.localeCompare(valueB);
                } else {
                    return valueB.localeCompare(valueA);
                }
            });

            table.querySelector("tbody").innerHTML = "";
            rows.forEach(row => table.querySelector("tbody").appendChild(row));

            headers.forEach(header => {
                const icon = header.querySelectorAll("svg");
                if (header.textContent.trim() === column) {
                    updateSortIcons(header, direction);
                } else {
                    updateSortIcons(header, "Default");
                }
            });
        }

        headers.forEach(header => {
            header.addEventListener("click", () => {
                const column = header.textContent.trim();
                counter ++;

                if (currentSortColumn === column) {
                    currentSortDirection = currentSortDirection === "asc" ? "desc" : "asc";
                } else {
                    sortTable("#", "asc")
                    currentSortColumn = column;
                    currentSortDirection = "desc";
                    counter = 1;
                }

                sortTable(column, currentSortDirection);
            });
        });
    });

</script>
