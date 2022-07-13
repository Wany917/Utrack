
const body = document.querySelector("body"),
switchMode = body.querySelector(".form-check-input");
const localTheme = localStorage.getItem('theme');

switchMode.addEventListener('click', function (){
document.body.classList.toggle('light');
    let theme = "";

    if (document.body.classList.contains('light')) {
        theme = "light";
        body.classList.remove('light');
    } else {
        theme = 'dark';
        body.classList.add('dark');
    }
    localStorage.setItem('theme', theme);
});

if (localTheme == 'light') {
    document.body.classList.add('light');
    switchMode.setAttribute('checked', 'true');
}
if (localTheme == 'dark') {
    document.body.classList.remove('light');
    switchMode.removeAttribute('checked');
}