const form = document.getElementById('form');
const errorContainer = document.getElementById('errors');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const inputs = Object.values(form);

    let errors = [];
    const els = document.getElementsByClassName('error-hint');

    for (const e of [...els]) {
        e.remove();
    }

    console.log(els.length)

    for (const input of inputs) {

        let error = null;
        switch (input.id) {
            case 'name':
                error = validateName(input.value);
                break;
            case 'email':
                error = validateEmail(input.value);
                break;
            case 'body':
                error = validateBody(input.value);
                break;
            case 'agree':
                error = validateAgreement(input.checked);
                break;
            default:
                break;
        }

        if (error !== null) {
            console.log(error);

            input.classList.add('error');
            errors.push(error);

            const item = document.createElement('li');
            item.innerText = error;
            item.classList.add('error-hint');
            errorContainer.append(item);

            const errorHint = document.createElement('span');
            errorHint.innerText = error;
            errorHint.classList.add('error-hint');
            input.after(errorHint);

        } else {
            input.classList.remove('error');
        }
    }

    if (errors.length > 0) {
        errorContainer.classList.add('active');
    } else {
        form.submit();
    }
});

function validateName(name) {
    const isNotEmpty = name.length > 0;
    const isCapitalized = /[A-Z][a-zA-Z\-]+/.test(name);
    
    const isValid = isNotEmpty && isCapitalized;

    if(!isValid) {
        return 'The name must be capitalized';
    }

    return null;
}

function validateEmail(email) {
    const isNotEmpty = email.length > 0;
    const containsAt = email.includes('@');
    const containsDot = email.includes('.');
    const segmentCount = email.split(/[\@|\.]/).length;

    const isValid = isNotEmpty && containsAt && containsDot && (segmentCount >= 3);

    if(!isValid) {
        return 'Email address must be valid';
    }

    return null;
}

function validateBody(body) {
    const isLongEnough = body.length > 50;
    const isShortEnough = body.length < 2000;

    const isValid = isLongEnough && isShortEnough;

    if(!isValid) {
        return 'The body must be between 50 ad 2000 characters';
    }

    return null;
}

function validateAgreement(agreement) {
    const isValid = agreement;

    if(!isValid) {
        return 'You must agree to data processing';
    }
    
    return null;
}