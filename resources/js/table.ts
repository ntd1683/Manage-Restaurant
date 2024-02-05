// @ts-ignore
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
let urlDelete : string | null = null;
let idDelete : number = 0;
function test123() {
    console.log("test123");
}
function deleteRow(rowNumber: number) {
    const table = document.getElementById("my_table") as HTMLTableElement;

    // @ts-ignore
    const rowToDelete: HTMLTableRowElement = table.rows[rowNumber];

    if (rowToDelete) {
        // @ts-ignore
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
            if (data === 0)
                { // @ts-ignore
                    openDialog({message: "Id Does Not Exist, Please try again later", icon: "x"})
                }
            else
                deleteRow(idDelete);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function deleteRowInTable(url: string | null, id: number) {
    urlDelete = url;
    idDelete = id;
    // @ts-ignore
    openDialog({
        title: "",
        message: "Are you sure you want to delete ?",
        confirm: true,
        icon: "x",
        messageOk: "Delete",
        callback: someCallback
    });
}

document.addEventListener("DOMContentLoaded", () => {

    const table = document.getElementById("my_table") as HTMLTableElement;
    // @ts-ignore
    const headers : HTMLTableCellElement[]  = Array.from(table.querySelectorAll("th")).filter(header => header.textContent.trim() !== "Delete");
    // @ts-ignore
    const nameColumn = headers.map(header => header.textContent.trim());
    let currentSortColumn: string | null = null;
    let currentSortDirection: string | null = null;
    let counter = 0;

    function updateSortIcons(header: HTMLTableCellElement, direction: string) {
        const icon = header.querySelectorAll(".icon-table");

        if (direction === "desc") {
            if (!icon[0].classList.contains("hidden"))
                icon[0].classList.add("hidden");
            if (!icon[1].classList.contains("hidden"))
                icon[1].classList.add("hidden");

            if (icon[2].classList.contains("hidden"))
                icon[2].classList.remove("hidden");
        } else if (direction === "asc") {
            if (!icon[0].classList.contains("hidden"))
                icon[0].classList.add("hidden");
            if (!icon[2].classList.contains("hidden"))
                icon[2].classList.add("hidden");

            if (icon[1].classList.contains("hidden"))
                icon[1].classList.remove("hidden");
        } else {
            console.log("check", direction)
            if (!icon[1].classList.contains("hidden"))
                icon[1].classList.add("hidden");
            if (!icon[2].classList.contains("hidden"))
                icon[2].classList.add("hidden");

            if (icon[0].classList.contains("hidden"))
                icon[0].classList.remove("hidden");
        }
    }

    function sortTable(column: string, direction: string) {
        const rows = Array.from(table.querySelectorAll("tbody tr"));
        const columnIndex = nameColumn.indexOf(column);

        rows.sort((rowA, rowB) => {
            // @ts-ignore
            const valueA = rowA.cells[columnIndex].textContent.trim();
            // @ts-ignore
            const valueB = rowB.cells[columnIndex].textContent.trim();

            if (direction === "asc") {
                return valueA.localeCompare(valueB);
            } else {
                return valueB.localeCompare(valueA);
            }
        });

        // @ts-ignore
        table.querySelector("tbody").innerHTML = "";
        // @ts-ignore
        rows.forEach(row => table.querySelector("tbody").appendChild(row));

        headers.forEach(header => {
            // @ts-ignore
            if (header.textContent.trim() === column) {
                updateSortIcons(header, direction);
            } else {
                updateSortIcons(header, "Default");
            }
        });
    }

    headers.forEach(header => {
        header.addEventListener("click", () => {
            // @ts-ignore
            const column = header.textContent.trim();
            counter++;

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
