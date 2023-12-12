
// Global
const inpDate = document.querySelector('.input-date') as HTMLInputElement

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
let datePicker: HTMLDivElement, daySelection: HTMLDivElement;

let currentDate = new Date()

let selectedMonthDO = new Date()

// Event
inpDate.addEventListener('click', function (e) {
    e.target.readonly = true
    datePicker = e.target.nextElementSibling
    datePicker.classList.toggle('hidden')

    daySelection = datePicker.querySelector('.day-selection')

    // Render
    renderCurrentDate()
    renderMonthSelection()
    renderDaySelection()
})

const btnPrevMonth = document.querySelector('.prev-month')
btnPrevMonth.addEventListener('click', function (e) {
    e.preventDefault()
    prevMonth()
})

const btnNextMonth = document.querySelector('.next-month')
btnNextMonth.addEventListener('click', function (e) {
    e.preventDefault()
    nextMonth()
})

// Func
function prevMonth() {
    selectedMonthDO.addMonth(-1)
    renderMonthSelection()
    renderDaySelection()
}

function nextMonth() {
    selectedMonthDO.addMonth(1)
    renderMonthSelection()
    renderDaySelection()
}

function renderMonthSelection() {
    datePicker.querySelector(".month-selection").textContent = months[selectedMonthDO.getMonth()] + ' ' + selectedMonthDO.getFullYear()
}

function renderDaySelection() {

    // Clear existing nodes first

    while (daySelection.firstChild) {
        daySelection.removeChild(daySelection.firstChild)
    }

    // Get total days in month
    let totalDaysInMonth = daysInMonth(selectedMonthDO.getMonth() + 1, selectedMonthDO.getFullYear())

    // Append new nodes
    for (let i = 1; i <= totalDaysInMonth; i++) {
        let el = document.createElement('a') as HTMLAnchorElement
        el.textContent = String(i)
        // Customise Tailwind classes here
        el.className = 'day w-[15%] text-center p-3 inline-block cursor-pointer rounded-full hover:bg-blue-500 hover:text-white'
        daySelection.appendChild(el)


        // Optional
        if (currentDate.getDate() == i && currentDate.getMonth() == selectedMonthDO.getMonth() && currentDate.getFullYear() == selectedMonthDO.getFullYear()) {
            el.classList.add('bg-blue-500', 'text-white')
        }
    }

    // Assign click event
    document.querySelectorAll('.day').forEach((el) => {
        el.addEventListener('click', () => {
            currentDate.setDate(parseInt(el.textContent))
            currentDate.setMonth(selectedMonthDO.getMonth())
            currentDate.setYear(selectedMonthDO.getFullYear())

            renderDaySelection()
            renderCurrentDate()

            inpDate.value = currentDate.toLocaleDateString('en-GB').split('T')[0]
            datePicker.classList.toggle('hidden')
        })
    })

}

function renderCurrentDate() {
    datePicker.querySelector(".current-date").textContent = currentDate.toLocaleDateString('en-GB')
}

function daysInMonth(month: number, year: number) {
    return new Date(year, month, 0).getDate();
}

// Prototypes
Date.prototype.addMonth = function (n: any) {
    return new Date(this.setMonth(this.getMonth() + n, 1))
}
