const form = document.getElementById('form-mail');
const btn_ask = document.getElementById('btn_form');
const input_email = document.createElement('input');
const btn_sub = document.createElement('button');
const label = document.createElement('label');

// Quand la brochure est demandée
btn_ask.addEventListener('click', () => {

    label.setAttribute('for', 'emailI');
    label.textContent = 'Entrez votre addresse email: ';

    input_email.setAttribute('type', 'email');
    input_email.setAttribute('id', 'emailI');
    input_email.setAttribute('name', 'emailI');
    input_email.setAttribute('placeholder', 'john@mail.com');
    input_email.setAttribute('required', '');

    btn_sub.setAttribute('type', 'submit');
    btn_sub.setAttribute('id', 'sub');
    btn_sub.textContent = "Envoyer";

    form.style.display = 'block'

    form.appendChild(label);
    form.appendChild(input_email);
    form.appendChild(btn_sub);
})

btn_sub.addEventListener('click', function () {
    alert('Cette fonctionalité n\'est pas encore disponible');
})
