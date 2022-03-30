const email = document.getElementById("account-input-name");
const form = document.forms("monform");
email
form.submit();
email.addEventListener("keyup", (event) => {
    if(email.validity.typeMismatch) {
        email.setCustomValidity("En attend d'un e-mail");
    } else {
        email.setCustomValidity("");
    }
});
