import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css';

function setDateFlatpickr() {
    const urlQuery = new URL(window.location.href);
    const date = urlQuery.searchParams.get('date') as string | null;
    if (date != null)
        flatpickr("#datepicker-basic", {defaultDate: new Date(date)});
    else
        flatpickr("#datepicker-basic", {defaultDate: new Date});
}

let searchQuery = "";
let dateQuery = "";
let levelQuery = -1;

function changeUrl() {
    const url = new URL(window.location.href);
    if (searchQuery != "")
        url.searchParams.set('search', searchQuery);

    if (dateQuery != "")
        url.searchParams.set('date', dateQuery);

    if (levelQuery != -1)
        url.searchParams.set('level', levelQuery.toString());
    else
        url.searchParams.delete('level');
    window.history.pushState({}, '', url);
}

function loadUrl()
{
    const url = new URL(window.location.href);
    const search = url.searchParams.get('search') as string | null;
    const date = url.searchParams.get('date') as string | null;
    const level = url.searchParams.get('level') as number | null;

    if (search != null) {
        let inputSearch = document.getElementById('input-search') as HTMLInputElement;
        inputSearch.value = search;
        searchQuery = search;
    }

    if (date != null)
        dateQuery = date;

    if (level != null){
        let inputLevel = document.querySelectorAll('input[name="level"]') as NodeListOf<HTMLInputElement>;
        inputLevel.forEach((e) => {
            if (parseInt(e.value) == level)
                e.checked = true;
        })
        levelQuery = level;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const btnSelectLevelMB = document.getElementById('button_select_level') as HTMLButtonElement;
    const selectLevelsMB = document.querySelectorAll('.select-level') as NodeListOf<HTMLElement>;
    selectLevelsMB.forEach((selectLevel) => {
        selectLevel.addEventListener('click', (e) => {
            // @ts-ignore
            let levelKeyMB = e.target.dataset.value;
            // @ts-ignore
            let levelValueMB = e.target.textContent;

            let textBtnSelectLevelMB = btnSelectLevelMB.innerHTML.trim();
            let startIndex = textBtnSelectLevelMB.indexOf('<svg');
            let svg = textBtnSelectLevelMB.slice(startIndex, textBtnSelectLevelMB.length).trim();
            btnSelectLevelMB.innerHTML = levelValueMB + ' ' + svg;
            levelQuery = levelKeyMB;
            getUserTable();
            changeUrl();
        });
    });

    // Date
    const inpDateJoin = document.getElementById('datepicker-basic') as HTMLInputElement;
    inpDateJoin.addEventListener('change', () => {
        dateQuery = inpDateJoin.value;
        getUserTable();
        changeUrl();
    });

    setDateFlatpickr();
    loadUrl();
    getUserTable();

    const searchInput = document.getElementById('input-search') as HTMLInputElement;
    let delayTimer: number | undefined;

    searchInput.addEventListener("keyup", (e) => {
        clearTimeout(delayTimer);
        // @ts-ignore
        searchQuery = e.target.value;
        console.log(searchQuery);
        delayTimer = setTimeout(() => {
            getUserTable();
            changeUrl();
        }, 3000);
    });
});

// @ts-ignore
const getUserTable = async () => {
    const currentUrl: string = window.location.origin;
    const url = currentUrl + '/admin/ajax/staff/get';
    // @ts-ignore
    const csrfTokenElement = document.querySelector<HTMLMetaElement>('meta[name="csrf-token"]').content;

    const requestData = {
        search: searchQuery,
        date: dateQuery,
        level: levelQuery,
        render: true,
        csrf: csrfTokenElement,
    };

    const queryString: string = Object.keys(requestData)
        // @ts-ignore
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(requestData[key])}`)
        .join('&');

    const urlWithQuery: string = `${url}?${queryString}`;
    console.log(urlWithQuery);

    // @ts-ignore
    try {
        fetch(urlWithQuery)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                const table = document.getElementById('table_html') as HTMLDivElement;
                table.innerHTML = data.data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } catch (error) {
        console.error('An error occurred during the request:', error);
    }
};
