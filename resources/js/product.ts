document.addEventListener("DOMContentLoaded", () => {
    const btnPlus = document.querySelectorAll(".plus") as NodeListOf<HTMLButtonElement>;
    const btnMinus = document.querySelectorAll(".minus") as NodeListOf<HTMLButtonElement>;

    const updateProductCount = (element: HTMLInputElement, step: number) => {
        const minCount = parseInt(element.getAttribute("min") || "0", 10);
        const maxCount = parseInt(element.getAttribute("max") || "100", 10);
        let count = parseInt(element.value, 10) + step;

        if (count >= minCount && count <= maxCount) {
            element.value = count.toString();
            updateSubTotal(element);
        }
    }

    const updateSubTotal = (element: HTMLInputElement) => {
        const eProduct = element.closest(".product");
        if (!eProduct) return;

        const price = parseInt(eProduct.previousElementSibling?.innerHTML?.substring(1), 10),
            count = parseInt(element.value, 10),
            subTotal = count * price;
        eProduct.nextElementSibling.innerHTML = "$" + subTotal;
    }

    btnPlus.forEach((plus) => {
        plus.addEventListener("click", (ePlus) => {
            let eCountProduct: HTMLInputElement;
            eCountProduct = ePlus.target?.previousElementSibling as HTMLInputElement;
            updateProductCount(eCountProduct, 1);
        })
    });

    btnMinus.forEach(minus => {
        minus.addEventListener("click", eMinus => {
            let eCountProduct: HTMLInputElement;
            eCountProduct = eMinus.target?.nextElementSibling as HTMLInputElement;
            updateProductCount(eCountProduct, -1);
        })
    })
});
