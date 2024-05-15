const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");
const contacUs = document.getElementById("contacUs");
const contactForm = document.querySelectorAll(".contactForm");
const signUp = document.querySelector(".sign_up");
const logIn = document.querySelector(".log_in");
const removeElement = document.querySelectorAll(".remove");
const url_input = document.getElementById("shortenUrl");
const url_button = document.getElementById("btn_Url");
const alert_error = document.querySelector(".alert-error");
const result = document.querySelector(".result");
const shortenUrl = document.querySelector(".url");
const openUrl = document.querySelector(".openUrl");
const copyUrl = document.querySelector(".copy");
const emptyInput = document.querySelector(".fa-solid");



// FADE NAVBAR
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });
    hamburger.classList.toggle("toggle");
});


// SHOW CONTACT FORM AND LOGIN AND SIGN UP
function multiShow(parFirst, parSecond, className) {
    if (parFirst) {
        parFirst.addEventListener("click", (e) => {
            e.preventDefault()
            parSecond.classList.add(className)
        })
    }
}


function displayItems() {
    multiShow(contacUs, contactForm[0], "activeCon")
    multiShow(signUp, contactForm[1], "activeCon")
    multiShow(logIn, contactForm[2], "activeCon")
} displayItems()


// REMOVE CLASS
function removeClass(parFirst, parSecond, className) {
    if (parFirst) {
        parFirst.addEventListener("click", () => {
            parSecond.classList.remove(className)
        })
    }
}

function removeItems() {
    removeClass(removeElement[0], contactForm[0], "activeCon")
    removeClass(removeElement[1], contactForm[1], "activeCon")
    removeClass(removeElement[2], contactForm[2], "activeCon")
} removeItems()

// MAKE INPUT EMPTY 
emptyInput.addEventListener("click", function () {
    url_input.value = "";
})


// FUNCTION FOR INPUT URL SHORTEN
url_button.addEventListener("click", (e) => {
    // THIS PATTERN CHECK IF URL START WITH NUMBER
    let pattern = /^\d/;
    if (!url_input.value.trim() || url_input.value.match(pattern)) {
        e.preventDefault();
        let check = !url_input.value ? "Please, make ensure the form is filled out." : "Please, provide a valid URL.";
        let notyf = new Notyf();
        notyf.error(check);
        url_input.focus();
        url_input.classList.add("error");
        alert_error.innerText = check;
    }
    else {
        function prosess() {
            url_button.value = "processing...";
            setTimeout(function () {
                url_button.value = "shorten URL";
                url_input.value = "";
            }, 2000);
        } prosess();

        // FETCH THE URL FROM USING API
        async function shortenURL() {
            try {
                let response = await fetch('https://tinyurl.com/api-create.php?url=' + encodeURIComponent(url_input.value.trim()));
                let shortenedURL = "";
                if (response.ok) {
                    shortenedURL = await response.text();
                    shortenUrl.innerText = shortenedURL;
                    // OPEN SHORTENED URL
                    openUrl.href = shortenedURL;
                    result.classList.add("show");
                    // ALERT MESSAGE 
                    let notyf = new Notyf();
                    notyf.success("The URL has been successfully shortened!");
                    // COPY SHORTENED URL
                    copyUrl.addEventListener("click", () => {
                        navigator.clipboard.writeText(shortenedURL);
                        let notyf = new Notyf();
                        notyf.success("Copied to clipboard!");
                    })
                } else if (!response.ok) {
                    // ALERT MESSAGE
                    let notyf = new Notyf();
                    notyf.error("Oops!, The URL has not been shortened.");
                    result.classList.add("show");
                    copyUrl.classList.add("error")
                    openUrl.classList.add("error")
                    shortenUrl.innerText = "Oops!, The URL has not been shortened."
                }
            } catch (error) {
                if (error) {
                    console.error('Error shortening URL:', error);
                }
            }
        } setTimeout(shortenURL, 1995);

        // RESET FORM INPUT WHEN ALL GOOD
        url_input.classList.remove("error");
        alert_error.innerText = "";
    }
})



// notify user when message sent seccessfully
function notifyUser() {
    let params = window.location.search;
    let dataLink = new URLSearchParams(params)
    let alert_message = dataLink.get("status")
    window.addEventListener("load", () => {
        switch (alert_message) {
            case "message sent":
                var notyf = new Notyf();
                notyf.success({
                    message: "The message has been sent successfully!",
                    duration: 5000,
                })
                break;
            case "welcome":
                var notyf = new Notyf();
                notyf.success({
                    message: "Welcome Back!",
                    duration: 5000,
                })
                break;
            case "Incorrect Password or Email":
                var notyf = new Notyf();
                notyf.error({
                    message: "Please provide valid information!",
                    duration: 5000,
                })
                break;
            case "User not found":
                var notyf = new Notyf();
                notyf.error({
                    message: "User not found. Please try again!",
                    duration: 5000,
                })
                break;
            default:
                break;
        }
    })
} notifyUser()