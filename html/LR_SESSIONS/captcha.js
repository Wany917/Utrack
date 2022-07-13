/*** Récupération des éléments du DOM ***/

    // Textes Captcha Complété
    let captchaVerif = document.getElementById('captchaVerif')
    let completed = document.getElementById('completed')

    // Consignes Captcha
    let colorCompleteInfo = document.getElementById('colorCompleteInfo')

    // Carrés du Captcha
    let captchaSquares = document.getElementsByClassName('captchaSquare')

    // Ids des Carrés du Captcha
    const squaresIds = Array.from(captchaSquares).map((square) => {
    return square.id;
    })

    // Bouton Sign Up
    let signUpButton = document.getElementById('signUp')

/**/

/*** Couleurs  ***/

    // Tableau couleurs captcha
    const colors = ['red', 'green', 'yellow']
    
    // Couleur de Validation
    let colorToComplete = colors[Math.floor(Math.random() * colors.length)]
    colorCompleteInfo.textContent = `All Squares Must be ${colorToComplete} -> (${colors.indexOf(colorToComplete)})`;
/**/

/*** Vérification ***/

    // Tableau données vérification
    let verify = []

    // Booléen Captcha Complété

    let captchaCompleted = false;

/*** Ajout events quand click sur carrés ***/

    Array.from(captchaSquares).forEach((square) => {

        // Changement de couleur du carré
        square.addEventListener('click', changeColor)

        // Vérification si captcha Complété
        square.addEventListener('click', checkCompletion)
    })
/**/

/*** Ajout event mouseover pour vérif captcha ***/

signUpButton.addEventListener('mouseover', isButtonActivated)

/**/

/*** Initialisation des couleurs random des différents carrés ***/

    Array.from(captchaSquares).forEach((square) => {
        randomColor = colors[Math.floor(Math.random() * colors.length)];
        square.style.backgroundColor = randomColor;
        square.textContent = colors.indexOf(randomColor);
    })

/**/

/*** Index tableau des couleurs ***/
    let color = 0;
/**/

/*** Changement de couleur des carrés quand clic ***/
    function changeColor(evt) {
        if(color < 2){
            evt.path[0].style.backgroundColor = colors[color];
            evt.path[0].textContent = colors.indexOf(colors[color]);
            color++;
        } else {
            evt.path[0].style.backgroundColor = colors[color];
            evt.path[0].textContent = colors.indexOf(colors[color]);
            color = 0;
        }
        squaresIds.forEach((square) => {
            let _square = document.getElementById(square)

            if(_square.style.backgroundColor == colorToComplete) {
                if(verify.indexOf(square) !== -1){
                }else{
                    verify.push(square)
                }
            }else{
                if(verify.indexOf(square) !== -1){
                    verify.splice(verify.indexOf(square))
                }
            }
        })
    }
/**/

/*** Activation / Désactivation du bouton signUp ***/

function isButtonActivated(){
    if(captchaCompleted == false){
        signUp.setAttribute("disabled", true)
    }
}

/**/

/*** Vérification Compétion du Captcha quand clic ***/
    function checkCompletion() {
        if (verify.length == 9) {
            completed.innerHTML = "Captcha Completed"
            captchaVerif.textContent = "Captcha Has Been Completed"
            captchaCompleted = true;
            signUp.removeAttribute("disabled")
        }else{
            completed.innerHTML = ""
            captchaVerif.textContent = "Click To Complete The Captcha"
            captchaCompleted = false;
        }
    }
/**/
