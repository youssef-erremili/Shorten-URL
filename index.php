<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shorten URL - errhub</title>
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>
<body>
    <header class="header">
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="public/image/errehub-wight.webp" alt="logo of the website">
                </a>
            </div>
            <div class="hamburger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">features</a></li>
                <li><a href="#">Services</a></li>
                <li id="contacUs"><a href="">Contact Us</a></li>
                <?php
                if (isset($_SESSION["userName"]) && !empty($_SESSION["userName"])) {
                    echo "<button role=\"button\" class=\"logged regBtn\">" . $_SESSION["userName"] . "</button>";
                    echo "<li><a class=\"logout\" href=\"logout/logout.php\">log out</a></li>";
                } else {
                    echo "
                        <li><button class=\"login-button log_in\">Log in</button></li>
                        <li><button class=\"join-button sign_up\">Sign in</button></li>
                    ";
                }
                ?>
            </ul>
        </nav>
        <div class="container">
            <div class="box sloganTitle">
                <div class="title">
                </div>
                <div class="textPar">
                    <h1>Shortening your URL is simpler than ever</h1>
                    <p>Shortening your URL is now incredibly easy, thanks to modern tools. With just a few clicks, you
                        can transform long links into concise ones, perfect for sharing on any platform. Simplify your
                        online interactions effortlessly.</p>
                    <span class="lines"></span>
                    <button>
                        get started
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="box charbotImg">
                <img src="public/image/intro.png" alt="illustration">
            </div>
        </div>
    </header>
    <main>
        <div class="shorten">
            <div class="row_cgdg">
                <h1>Paste the URL to be shortened</h1>
                <div class="form-group">
                    <input type="text" name="url-short" id="shortenUrl" autocomplete="off"
                        placeholder="Enter Your URL Here">
                    <i id="fa-solid" class="fa-solid fa-xmark"></i>
                    <span class="alert-error"></span>
                    <input type="button" name="short_Url" id="btn_Url" value="shorten URL">
                </div>
                <div class="result">
                    <h4>URL :</h4>
                    <p class="url"></p>
                    <section>
                        <a href="" class="openUrl" target="_blank" rel="noopener noreferrer">Open URL</a>
                        <button type="button" class="copy">copy URL</button>
                    </section>
                </div>
                <h6 class="information-text">ShortURL is a free tool to shorten URLs and generate short links
                    URL shortener allows to create a shortened link making it easy to share</h6>
            </div>
        </div>
        <div class="feat__h1">
            <h1>Amazing features for to make your work easier</h1>
            <p>Unlock the power of concise communication with our URL shortening service! Whether you're sharing links
                on social media, blogs, or messaging apps, our platform streamlines lengthy URLs from Instagram,
                Facebook, YouTube, Twitter, LinkedIn, WhatsApp, TikTok, and more. Simply paste your long link, click
                'Shorten URL,' and effortlessly share the condensed version across the web. Experience the convenience
                of shortened URLs for seamless sharing in publications, documents, advertisements, and beyond</p>
        </div>
        <div class="boxModel">
            <div class="col__Model col1">
                <div class="imageBox">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <div class="tx__content">
                    <h3>easy to use</h3>
                    <p>ShortURL is easy and fast, enter the long link to get your shortened link</p>
                </div>
            </div>
            <div class="col__Model col1">
                <div class="imageBox">
                    <i class="fa-solid fa-code"></i>
                </div>
                <div class="tx__content">
                    <h3>Shorten any size</h3>
                    <p>Use any link, no matter what size, ShortURL always shortens</p>
                </div>
            </div>
            <div class="col__Model col1">
                <div class="imageBox">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="tx__content">
                    <h3>Secure Service</h3>
                    <p>It is fast and secure, our service has HTTPS protocol and data encryption</p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <div class="containerEL">
                <div class="remove">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <form action="contact/contact.php" method="post">
                    <h3>contac Us</h3>
                    <label for="name"><span>Name <span class="required-star">*</span></span></label>
                    <input type="text" id="name" name="user_name" placeholder="full name" required>
                    <label for="mail"><span>Email <span class="required-star">*</span></span></label>
                    <input type="email" id="mail" name="user_email" placeholder="email address">
                    <label for="msg"><span>Message <span class="required-star">*</span></span></label>
                    <textarea rows="4" id="msg" cols="50" name="message" placeholder="message"></textarea>
                    <input type="submit" value="submit" name="contact">
                </form>
            </div>
        </div>
        <div class="contactForm">
            <div class="containerEL">
                <div class="remove">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <form action="sign/sign.php" method="post">
                    <h3>sign up</h3>
                    <label for="first_name"><span>first name <span class="required-star">*</span></span></label>
                    <input type="text" id="first_name" name="first_name" placeholder="first name" required>
                    <label for="last_name"><span>last name <span class="required-star">*</span></span></label>
                    <input type="text" id="last_name" name="last_name" placeholder="last name" required>
                    <label for="email_sign"><span>Email address<span class="required-star">*</span></span></label>
                    <input type="email" id="email_sign" name="user_email" placeholder="email address" required>
                    <label for="password_sign"><span>password <span class="required-star">*</span></span></label>
                    <input type="password" id="password_sign" name="user_password" placeholder="password">
                    <input type="submit" value="sign up" name="signup">
                </form>
            </div>
        </div>
        <div class="contactForm">
            <div class="containerEL">
                <div class="remove">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <form action="login/login.php" method="post">
                    <h3>Login</h3>
                    <label for="email_login"><span>Email address<span class="required-star">*</span></span></label>
                    <input type="email" id="email_login" name="email_login" placeholder="email address" required>
                    <label for="password_login"><span>password <span class="required-star">*</span></span></label>
                    <input type="password" id="password_login" name="password_login" placeholder="password" required>
                    <input type="submit" value="log in" name="login">
                </form>
            </div>
        </div>
        <div class="track">
            <div class="trackCol left__Col">
                <h3>ABOUT US</h3>
                <div class="trackContent">
                    <h2>Who we are, and what purpose behind this project.</h2>
                    <p>I am someone who loves making long web addresses short! It's all about convenience and efficiency
                        for me. I've become pretty skilled at using URL shortening services to shrink those lengthy
                        links down to manageable sizes. It's not just about saving characters; it's about making it
                        easier for people to share and access information online. So, if you ever need a link trimmed
                        down to size, I'm your go-to person!</p>
                </div>
            </div>
            <div class="trackCol right_Col">
                <div class="imagAbout">
                    <img src="public/image/about.svg" alt="image about">
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="row">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="row">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>
            <div class="row">
                Errehub Copyright © 2024 Errehub - All rights reserved || Designed By: YOUSSEF ERREMILI
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var disclaimer =  document.querySelector("img[alt='www.000webhost.com']");
            if(disclaimer){
                disclaimer.remove();
        }  
        });        
    </script>
    <script src="public/main.js"></script>
    <script src="https://kit.fontawesome.com/25ae13bf53.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>
</html>