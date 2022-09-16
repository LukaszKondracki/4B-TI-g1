const button = document.getElementById('theme');
const html = document.querySelector('html');

const store = window.localStorage;

html.className = store.getItem('theme');

button.addEventListener('click', () => {

    const isLight = html.classList.contains('light');

    if (isLight) {
        html.classList.remove('light');
        button.innerText = '🌞';
        store.setItem('theme', 'dark');
    } else {
        html.classList.add('light');
        button.innerText = '🌚';
        store.setItem('theme', 'light');
    }
});
