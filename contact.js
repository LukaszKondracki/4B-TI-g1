const form = document.getElementById('form');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const inputs = Object.values(form);

    for (const input of inputs) {
        // console.log(`Input ${input.id} has value ${input.value}`);

        switch (input.id) {
            case 'name':
                validateName(input.value);
                break;
            case 'email':
                validateEmail(input.value);
                break;
            case 'body':
                validateBody(input.value);
                break;
            case 'agree':
                validateAgreement(input.checked);
                break;
            default:
                break;
        }
    }

    // form.submit();
});

function validateName(name) {
    const isNotEmpty = name.length > 0;
    const isCapitalized = /[A-Z][a-zA-Z\-]+/.test(name);
    
    const isValid = isNotEmpty && isCapitalized;

    console.log(`The name ${isValid ? 'is' : 'is not'} valid`);
}

function validateEmail(email) {
    const isNotEmpty = email.length > 0;
    const containsAt = email.includes('@');
    const containsDot = email.includes('.');
    const segmentCount = email.split(/[\@|\.]/).length;

    const isValid = isNotEmpty && containsAt && containsDot && (segmentCount >= 3);

    console.log(`The email ${isValid ? 'is' : 'is not'} valid`);
}

function validateBody(body) {
    const isLongEnough = body.length > 50;
    const isShortEnough = body.length < 2000;

    const isValid = isLongEnough && isShortEnough;

    console.log(`The body ${isValid ? 'is' : 'is not'} valid`);
}

function validateAgreement(agreement) {
    const isValid = agreement;
    
    console.log(`The agreement ${isValid ? 'is' : 'is not'} valid`);
}