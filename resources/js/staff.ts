import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css';

flatpickr("#datepicker-basic", {defaultDate: new Date});

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
            getUserTable(1, levelKeyMB);
        });
    });
});

// @ts-ignore
const getUserTable = async (type: Int, key: Int) => {
    const currentUrl: string = window.location.origin;
    const url = currentUrl + '/admin/ajax/staff/get';
    // @ts-ignore
    const csrfTokenElement = document.querySelector<HTMLMetaElement>('meta[name="csrf-token"]').content;

    const requestData = {
        level: key,
        type: type,
        render: true,
        csrf: csrfTokenElement,
    };

    const queryString: string = Object.keys(requestData)
        // @ts-ignore
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(requestData[key])}`)
        .join('&');

    const urlWithQuery: string = `${url}?${queryString}`;

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
