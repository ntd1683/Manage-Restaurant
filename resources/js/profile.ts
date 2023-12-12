const inpName = document.getElementById('name') as HTMLInputElement;
const inpPhone = document.getElementById('phone') as HTMLInputElement;
const inpIdCard = document.getElementById('id-card') as HTMLInputElement;
const inpEmail = document.getElementById('email') as HTMLInputElement;
const inpBirthday = document.getElementById('birthday') as HTMLInputElement;
const inpPasswordOld = document.getElementById('old-password') as HTMLInputElement;
const inpPasswordNew = document.getElementById('new-password') as HTMLInputElement;
const form = document.getElementById('form-profile') as HTMLFormElement;

let errors: { [key: string]: string } = {};


const validateEmail = (email : string) => /\S+@\S+\.\S+/.test(email);

const setErrorInput = (input: HTMLInputElement) => {
    input.style.border = "1px solid red";
    input.style.color = "red";
}
document.addEventListener('DOMContentLoaded', () => {
    form.addEventListener('submit', (e) => {
        console.log(123);
        const name = inpName?.value;
        const phone = inpPhone?.value;
        const idCard = inpIdCard?.value;
        const email = inpEmail?.value;
        const birthday = inpBirthday?.value;
        const passwordOld = inpPasswordOld?.value;
        const passwordNew = inpPasswordNew?.value;

        console.log(name, phone, idCard, email, birthday, passwordOld, passwordNew);

        e.preventDefault();
        let isValidated = true;

        if (name.length < 3) {
            setErrorInput(inpName);
            errors.name = "Name must be at least 3 characters";
            isValidated = false;
        }

        if (phone.length < 6) {
            setErrorInput(inpPhone);
            errors.phone = "Phone must be at least 6 characters";
            isValidated = false;
        }

        if (idCard.length < 9) {
            setErrorInput(inpIdCard);
            errors.idCard = "Id Card must be at least 9 characters";
            isValidated = false;
        }

        if (email.length < 6) {
            setErrorInput(inpEmail);
            errors.email = "Email must be at least 6 characters";
            isValidated = false;
        } else if (!validateEmail(email)) {
            setErrorInput(inpEmail);
            errors.email = "Email is invalid";
            isValidated = false;
        }

        if (birthday.length < 1) {
            setErrorInput(inpBirthday);
            errors.birthday = "Birthday must be at least 1 characters";
            isValidated = false;
        }

        if (passwordOld.length !== 0 && passwordNew.length < 1) {
            setErrorInput(inpPasswordOld);
            setErrorInput(inpPasswordNew);
            inpPasswordOld.style.zIndex = "100";
            inpPasswordNew.style.zIndex = "100";

            errors.passwordOld = "New Password must be at least 1 characters";
            isValidated = false;
        }

        if (passwordOld === passwordNew && passwordOld.length !== 0 && passwordNew.length !== 0) {
            setErrorInput(inpPasswordOld);
            setErrorInput(inpPasswordNew);
            inpPasswordOld.style.zIndex = "100";
            inpPasswordNew.style.zIndex = "100";

            errors.passwordOld = "Password must be different";
            isValidated = false;
        }

        if (isValidated)
            form.submit();
        else {
            const errorElement = document.getElementById('error-message') as HTMLDivElement;
            // @ts-ignore
            errorElement.innerHTML = Object.values(errors).join('<br>');
        }
    });
})
