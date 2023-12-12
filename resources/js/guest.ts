import {createIcons, Eye, EyeOff, ChevronRight, Sun, Moon, ChevronUp} from 'lucide';

createIcons({icons: {Eye, EyeOff, ChevronRight, Sun, Moon, ChevronUp}});

const setProperty = (object: object, property: string | symbol, value: any) => {
    if (property in object) {
        Object.defineProperty(object, property, {
            enumerable: true, configurable: true, writable: true, value: value
        })
    } else {
        object[property] = value;
    }
    return value;
}
const setPropertySimple = (object: object, property: string | symbol, value: any) => {
    setProperty (object, typeof property != "symbol" ? property + "" : property, value);
    return value;
}

class validate {
    private validateEmail: (email: string) => boolean;

    private form: HTMLFormElement;
    private readonly email: HTMLInputElement | null;
    private readonly emailError: HTMLDivElement | null;
    private readonly password: HTMLInputElement | null;
    private readonly passwordError: HTMLDivElement | null;
    private errors: { [key: string]: string } = {};

    constructor() {
        setPropertySimple(this, "validateEmail", (email: string) => /\S+@\S+\.\S+/.test(email));
        this.form = document.querySelector("[data-x-form]");
        this.email = this.form?.querySelector("[data-x-field='email']");
        this.emailError = this.form?.querySelector("[data-x-field-error='email']");
        this.password = this.form?.querySelector("[data-x-field='password']");
        this.passwordError = this.form?.querySelector("[data-x-field-error='password']");
    }

    initEventListener() {
        this.form.addEventListener("submit", e => {
            e.preventDefault();
            const email = this.email.value,
                password = this.password.value;

            if(email.length === 0) this.errors.email = "Please enter a email address";
            else if(!this.validateEmail(email)) this.errors.email = "Please enter a proper email";

            if(password.length === 0) this.errors.password = "Please enter a password";
            else if(password === "password") this.errors.password = "Password is too weak";

            if (Object.keys(this.errors).length === 0) {
                this.form.submit();
            } else {
                this.showErrors();
            }
        })
    }

    private clearErrors(): void {
        if (this.emailError) {
            this.emailError.innerHTML = '';
        }

        if (this.passwordError) {
            this.passwordError.innerHTML = '';
        }
    }

    private showErrors(): void {
        this.clearErrors();

        if (this.errors.email && this.emailError) {
            this.emailError.innerHTML = this.errors.email;
        }

        if (this.errors.password && this.passwordError) {
            this.passwordError.innerHTML = this.errors.password;
        }

        this.errors = {};
    }

    init(): void {
        if (this.email && this.password) {
            this.initEventListener();
        }
    }
}

new validate().init();
