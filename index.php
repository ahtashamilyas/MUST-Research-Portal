<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

<style>
  /*=============== GOOGLE FONTS ===============*/
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap');

/*=============== VARIABLES CSS ===============*/
:root {
  --header-height: 3.5rem;

  /*========== Colors ==========*/
  --hue: 14;
  --first-color: hsl(240, 52%, 42%);
  --first-color-alt: hsl(240, 88%, 23%);
  --title-color: hsl(0, 0%, 100%);
  --text-color: hsl(0, 0%, 100%);
  --text-color-light: hsl(var(--hue), 4%, 55%);

  /*Green gradient*/
  --body-color: linear-gradient(136deg, hsl(240, 64%, 95%) 0%, hsl(242, 81%, 94%) 100%);
  --container-color: linear-gradient(136deg, hsl(246, 90%, 72%) 0%, hsl(246, 83%, 67%) 100%);
  /*========== Font and typography ==========*/
  --body-font: 'Poppins', sans-serif;
  --biggest-font-size: 2rem;
  --h1-font-size: 1.5rem;
  --h2-font-size: 1.25rem;
  --h3-font-size: 1rem;
  --normal-font-size: .938rem;
  --small-font-size: .813rem;
  --smaller-font-size: .75rem;
  /*========== Font weight ==========*/
  --font-medium: 500;
  --font-semi-bold: 600;
  --font-black: 900;

  /*========== Margenes Bottom ==========*/
  --mb-0-25: .25rem;
  --mb-0-5: .5rem;
  --mb-0-75: .75rem;
  --mb-1: 1rem;
  --mb-1-5: 1.5rem;
  --mb-2: 2rem;
  --mb-2-5: 2.5rem;

  /*========== z index ==========*/
  --z-tooltip: 10;
  --z-fixed: 100;
}

/* Responsive typography */
@media screen and (min-width: 992px) {
  :root {
    --biggest-font-size: 4rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
  }
}

/*=============== BASE ===============*/
*{
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

html{
  scroll-behavior: smooth;
}

body{
  margin: var(--header-height) 0 0 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  background: var(--body-color);
  color: var(--text-color);
}

h1,h2,h3,h4{
  color: var(--title-color);
  font-weight: var(--font-semi-bold);
}

ul{
  list-style: none;
}

a{
  text-decoration: none;
}

img{
  max-width: 100%;
  height: auto;
}

button,
input{
  border: none;
  outline: none;
}

button{
  cursor: pointer;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}

/*=============== REUSABLE CSS CLASSES ===============*/
.section{
  padding: 4.5rem 0 2rem;
}

.section__title{
  font-size: var(--h2-font-size);
  margin-bottom: var(--mb-2);
  text-align: center;
}

/*=============== LAYOUT ===============*/
.container{
  max-width: 100%;
  margin-left: var(--mb-1-5);
  margin-right: var(--mb-1-5);
}

.grid{
  display: grid;
}

.main{
  overflow: hidden; /*For animation*/
}

/*=============== HEADER ===============*/
.header{
  width: 100%;
  background: rgb(0, 3, 170);
  position: fixed;
  top: 0;
  left: 0;
  z-index: var(--z-fixed);
}

/*=============== NAV ===============*/
.nav{
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav__logo{
  display: flex;
  column-gap: .5rem;
  font-weight: var(--font-medium);
}

.nav__logo-img{
  width: 1.25rem;
}

.nav__link,
.nav__logo,
.nav__toggle,
.nav__close{
  color: var(--title-color);
}

.nav__toggle{
  font-size: 1.25rem;
  cursor: pointer;
}

@media screen and (max-width: 767px){
  .nav__menu{
    position: fixed;
    width: 100%;
    background: var(--container-color);
    top: -150%;
    left: 0;
    padding: 3.5rem 0;
    transition: .4s;
    z-index: var(--z-fixed);
    border-radius: 0 0 1.5rem 1.5rem;
  }
}

.nav__img{
  width: 300px;
  position: absolute;
  top: 0;
  left: 0;
}

.nav__close{
  font-size: 1.8rem;
  position: absolute;
  top: .5rem;
  right: .7rem;
  cursor: pointer;
}

.nav__list{
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 1.5rem;
}

.nav__link{
  text-transform: uppercase;
  font-weight: var(--font-black);
  transition: .4s;
}

.nav__link:hover{
  color: var(--text-color);
}

/* Show menu */
.show-menu{
  top: 0;
}

/* Change background header */
.scroll-header{
  background: var(--container-color);
}

/* Active link */
.active-link{
  position: relative;
}

.active-link::before{
  content: '';
  position: absolute;
  bottom: -.75rem;
  left: 45%;
  width: 5px;
  height: 5px;
  background-color: var(--title-color);
  border-radius: 50%;
}

/*=============== HOME ===============*/
.home__content{
  row-gap: 1rem;
  background-image: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)),url("images/faculty-image.jpeg");
  background-position: center; /* Center the image */
  background-size: cover;
  height: 728px;
  width: 100%;
}

.home__group{
  display: grid;
  position: relative;
  padding-top: 2rem;
}

.home__img{
  height: 50px;
  border-radius: 30%;
  justify-self: bottom;
}

.home__indicator{
  width: 8px;
  height: 8px;
  background-color: var(--title-color);
  border-radius: 50%;
  position: absolute;
  top: 7rem;
  right: 2rem;
}

.home__indicator::after{
  content: '';
  position: absolute;
  width: 1px;
  height: 48px;
  background-color: var(--title-color);
  top: -3rem;
  right: 45%;
}

.home__details-img{
  position: absolute;
  right: .5rem;
}

.home__details-title,
.home__details-subtitle{
  display: block;
  font-size: var(--small-font-size);
  text-align: Bottom;
}

.home__subtitle{
  font-size: var(--h3-font-size);
  text-transform: uppercase;
  margin-bottom: var(--mb-1);
}

.home__title{
  font-size: var(--biggest-font-size);
  font-weight: var(--font-black);
  line-height: 109%;
  margin-bottom: var(--mb-1);
}

.home__description{
  margin-bottom: var(--mb-1);
}

.home__buttons{
  display: flex;
  justify-content: space-between;
}

/*=============== BUTTONS ===============*/
.button{
  display: inline-block;
  background-color: var(--first-color);
  color: var(--title-color);
  padding: 1rem 1.75rem;
  border-radius: .5rem;
  /* border-width: 5px; */
  font-weight: var(--font-medium);
  transition: .3s;
}

.button:hover{
  background-color: var(--first-color-alt);
}


.button--ghost{
  border: 2px solid;
  background-color: transparent;
  border-radius: 3rem;
  padding: .75rem 1.5rem;
}

.button--link{
  color: var(--title-color);
}

.button--flex{
  display: inline-flex;
  align-items: center;
  column-gap: .5rem;
}

/*=============== ABOUT ===============*/
.about__container{
  row-gap: 2rem;
  border-radius: 5%;
  background-color: rgba(213, 211, 241, 0.644);
}

.about__data{
  text-align: center;
}

.about__description{
  margin-bottom: var(--mb-2);
  color: black;
}
.about__img{
  width: 200px;
  justify-self: center;
  animation: floating 2s ease-in-out infinite;
}
/*=============== NEWSLETTER ===============*/
.newsletter__description{
  text-align: center;
  color:black;
  margin-bottom: var(--mb-1-5);
}

.newsletter__form{
  background: var(--container-color);
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  border-radius: .75rem;
}

.newsletter__input{
  width: 70%;
  padding: 0 .5rem;
  background: none;
  color: var(--title-color);
}

.newsletter__input::placeholder{
  color: var(--text-color);
}
.newletter__form {
  background: var(--container-color);
  padding: 1rem;
  display: flex;
  flex-direction: column; /* Change to column layout */
  align-items: flex-start; /* Align items to the start of the column */
  border-radius: 0.75rem;
}

.newletter__input {
  width: 100%; /* Make inputs take full width */
  padding: 0.5rem;
  margin-bottom: 0.5rem; /* Add some spacing between inputs */
  background: none;
  color: var(--title-color);
}

.newletter__input::placeholder {
  color: var(--text-color);
}

/*=============== FOOTER ===============*/
.footer{
  background-color: rgb(7, 9, 134);
  position: relative;
  overflow: hidden;
}
.footer__container{
  row-gap: 2rem;
}

.footer__logo{
  display: flex;
  align-items: center;
  column-gap: .5rem;
  margin-bottom: var(--mb-1);
  font-weight: var(--font-medium);
  color: var(--title-color);
}

.footer__logo-img{
  width: 20px;
}

.footer__description{
  margin-bottom: var(--mb-2-5);
}

.footer__social{
  display: flex;
  column-gap: .75rem;
}

.footer__social-link{
  display: inline-flex;
  background: var(--container-color);
  padding: .25rem;
  border-radius: .25rem;
  color: var(--title-color);
  font-size: 1rem;
}

.footer__social-link:hover{
  background: var(--body-color);
}

.footer__title{
  font-size: var(--h3-font-size);
  margin-bottom: var(--mb-1);
}

.footer__links{
  display: grid;
  row-gap: .35rem;
}

.footer__link{
  font-size: var(--small-font-size);
  color: var(--text-color);
  transition: .3s;
}

.footer__link:hover{
  color: var(--title-color);
}

.footer__copy{
  display: block;
  text-align: center;
  font-size: var(--smaller-font-size);
  margin-top: 4.5rem;
}

/*=============== SCROLL UP ===============*/
.scrollup{
  position: fixed;
  background: var(--container-color);
  right: 1rem;
  bottom: -20%;
  display: inline-flex;
  padding: .3rem;
  border-radius: .25rem;
  z-index: var(--z-tooltip);
  opacity: .8;
  transition: .4s;
}

.scrollup__icon{
  font-size: 1.25rem;
  color: var(--title-color);
}

.scrollup:hover{
  background: var(--container-color);
  opacity: 1;
}

/* Show Scroll Up*/
.show-scroll{
  bottom: 3rem;
}

/*=============== SCROLL BAR ===============*/
::-webkit-scrollbar{
  width: 0.6rem;
  background: #413e3e;
}

::-webkit-scrollbar-thumb{
  background: #272525;
  border-radius: .5rem;
}

/*===============  BREAKPOINTS ===============*/
/* For small devices */
@media screen and (max-width: 320px){
  .container{
    margin-left: var(--mb-1);
    margin-right: var(--mb-1);
  }

  .home__img{
    height: 200px;
  }
  .home__buttons{
    flex-direction: column;
    width: max-content;
    row-gap: 1rem;
  }

  .category__container,
  .trick__container{
    grid-template-columns: .8fr;
    justify-content: center;
  }
}

/* For medium devices */
@media screen and (min-width: 576px){
  .about__container{
    grid-template-columns: .8fr;
    justify-content: center;
  }

  .newsletter__container{
    display: grid;
    grid-template-columns: .7fr;
    justify-content: center;
  }
  .newsletter__description{
    padding: 0 3rem;
  }
}

@media screen and (min-width: 767px){
  body{
    margin: 0;
  }

  .section{
    padding: 7rem 0 2rem;
  }

  .nav{
    height: calc(var(--header-height) + 1.5rem);
  }
  .nav__img,
  .nav__close,
  .nav__toggle{
    display: none;
  }
  .nav__list{
    flex-direction: row;
    column-gap: 3rem;
  }
  .nav__link{
    text-transform: initial;
    font-weight: initial;
  }

  .home__content{
    padding: 8rem 0 2rem;
    grid-template-columns: repeat(2, 1fr);
    gap: 4rem;
  }
  .home__img{
    height: 300px;
  }
  .swiper-pagination{
    margin-top: var(--mb-2);
  }

  .category__container{
    grid-template-columns: repeat(3, 200px);
    justify-content: center;
  }

  .about__container{
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
  }
  .about__title,
  .about__data{
    text-align: center;
  }
  .about__img{
    width: 250px;
  }

  .trick__container{
    grid-template-columns: repeat(3, 200px);
    justify-content: center;
    gap: 2rem;
  }

  .discount__container{
    grid-template-columns: repeat(2, max-content);
    justify-content: center;
    align-items: center;
    column-gap: 3rem;
    padding: 3rem 0;
    border-radius: 3rem;
  }
  .discount__img{
    width: 350px;
    order: -1;
  }
  .discount__data{
    padding-right: 6rem;
  }

  .newsletter__container{
    grid-template-columns: .5fr;
  }

  .footer__container{
    grid-template-columns: repeat(4, 1fr);
    justify-items: center;
    column-gap: 1rem;
  }
  .footer__img-two{
    right: initial;
    bottom: 0;
    left: 15%;
  }
}

/* For large devices */
@media screen and (min-width: 992px){
  .container{
    margin-left: auto;
    margin-right: auto;
  }

  .section__title{
    font-size: var(--h1-font-size);
    margin-bottom: 3rem;
  }

  .home__content{
    padding-top: 9rem;
    gap: 3rem;
  }
  .home__group{
    padding-top: 0;
  }
  .home__img{
    height: 400px;
    transform: translateY(-3rem);
  }
  .home__indicator{
    top: initial;
    right: initial;
    bottom: 15%;
    left: 45%;
  }
  .home__indicator::after{
    top: 0;
    height: 75px;
  }
  .home__details-img{
    bottom: 0;
    right: 58%;
  }
  .home__title{
    margin-bottom: var(--mb-1-5);
  }
  .home__description{
    margin-bottom: var(--mb-2-5);
    padding-right: 2rem;
  }

  .category__container{
    column-gap: 8rem;
  }
  .category__img{
    width: 200px;
  }

  .about__container{
    column-gap: 7rem;
  }
  .about__img{
    width: 350px;
  }
  .about__description{
    padding-right: 2rem;
  }

  .trick__container{
    gap: 3.5rem;
  }
  .trick__content{
    border-radius: 1.5rem;
  }
  .trick__img{
    width: 110px;
  }
  .trick__title{
    font-size: var(--h3-font-size);
  }

  .discount__container{
    column-gap: 7rem;
  }

  .new__content{
    width: 310px;
    border-radius: 1rem;
    padding: 2rem 0;
  }
  .new__img{
    width: 150px;
  }
  .new__img,
  .new__subtitle{
    margin-bottom: var(--mb-1);
  }
  .new__title{
    font-size: var(--h3-font-size);
  }

  .footer__copy{
    margin-top: 6rem;
  }
}

@media screen and (min-width: 1200px){
  .home__img{
    height: 420px;
  }
  .swiper-pagination{
    margin-top: var(--mb-2-5);
  }
  .footer__img-one{
    width: 120px;
  }
  .footer__img-two{
    width: 180px;
    top: 30%;
    left: -3%;
  }
}

/*=============== KEYFRAMES ===============*/
@keyframes floating {
  0% { transform: translate(0,  0px); }
  50%  { transform: translate(0, 15px); }
  100%   { transform: translate(0, -0px); }   
}
/*=============== contact page ===============*/
.col {
  flex: 1;
  padding-left: 20px;
  text-align: center;
  color: black;
}


  </style>

        <title>MUST Scholars</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="images/must_logo_White5.png" alt="">
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#about" class="nav__link">About</a>
                        </li>

                        <li class="nav__item">
                            <a href="#Contact" class="nav__link">Contact</a>
                        </li>
                        <a href="/UserNavBar/main/registration.php" class="button button--ghost">Sign Up</a>
                        <a href="/Login.php" class="button button--ghost">Login</a>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <img src="images/logo1.jpeg" alt="" class="nav__img">
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

            </nav>
        </header>

        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home container" id="home">
                <div class="swiper home-swiper">
                    <div class="swiper-wrapper">
                        <!-- HOME SLIDER 1 -->
                        <section class="swiper-slide">
                            <div class="home__content grid">
                                <div class="home__group">
                                    <img src="images/download.jpeg" alt="" class="home__img">
                                    <div class="home__indicator"></div>
    
                                    <div class="home__details-img">
                                        <h4 class="home__details-title">The Vice Chancellor</h4>
                                        <span class="home__details-subtitle">“Prof. Dr. Muhammad Younus Javed, SI(M)”</span>
                                    </div>
                                </div>
    
                                <div class="home__data">
                                    <h1 class="home__title">Welcome, Must Scholars</h1>
                                    <p class="home__description">-With a view to enhance facilities for higher education research in the state of AZAD JAMMU &
KASHMIR<br> and the adjoining areas in the feild of SCIENCE & TECHNOLOGY, presidential Ordinance
No.XVIII of 2008</p>
                                    <div class="home__buttons">
                                        <a href="/UserNavBar/main/registration.php" class="button">SignUp Now</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!--==================== ABOUT ====================-->
               <section class="section about" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title" style="color: rgba(9, 3, 94, 0.644);">About MUST Research Portal</h2><hr>
                        <p class="about__description">
                          The MUST Research Portal is an innovative system designed to revolutionize the management of research papers at MUST University, enhancing research productivity and academic excellence. It offers efficient storage, retrieval, and collaboration capabilities for teachers and researchers, with a focus on comprehensive paper organization. Unique features include customizable column orders for data flexibility, PDF report generation for easy sharing and printing, and meticulous administrator oversight to ensure data integrity and publication credibility. The user-friendly interface enables effortless paper submission, viewing, and searching, creating a streamlined environment for researchers and administrators alike.
                        </p>
                        <a href="#" class="button">Know more</a>
                    </div>
                    <img src="images/logomust.png" alt="" class="about__img">
                </div>
              </section>
               <!--==================== Contact Us ====================-->
               <section class="section newsletter" id="Contact">
               <h2 class="section__title about__title" style="color: rgba(9, 3, 94, 0.644);">Contact US</h2>
        <div class="about__container container grid"><form action="https://formspree.io/f/xlekrqdr" method="POST" class="newletter__form">
      <hr><input class="newletter__input" type="text" id="name" name="name" placeholder="Your Name" required><hr>
      <input class="newletter__input" type="email" id="email" name="_replyto" placeholder="Your E-mail" required>
    <br><textarea class="newletter__input" id="message" name="message" rows="4"  placeholder="Your Message" required></textarea>
  <button class="button" type="submit">Send</button>
</form>
      <div class="col">
        <div class="mt-2">
          <h3 class="h6"style="color: rgba(9, 3, 94, 0.644);">Address</h3>
          <div class="pb-2 text-secondary">Allama Iqbal Road, Mirpur Azad Jammu & Kashmir.(10250)</div><br>
          <hr>
          <h3 class="h6" style="color: rgba(9, 3, 94, 0.644);">Phone</h3>
          <div class="pb-2 text-secondary">+92-5827-961037</div><br>
          <hr>
          <h3 class="h6" style="color: rgba(9, 3, 94, 0.644);">Email</h3>
          <div class="pb-2 text-secondary">info@must.edu.pk</div>
        </div>
      </div>
        </div>
            <!--==================== OUR NEWSLETTER ====================-->
            <section class="section newsletter">
                <div class="newsletter__container container">
                    <h2 class="section__title about__title" style="color: rgba(9, 3, 94, 0.644);">Our Newsletter</h2>
                    <p class="newsletter__description">
                        Promotion new Updates and Features. Directly to your inbox
                    </p>

                    <form action="" class="newsletter__form">
                        <input type="text" placeholder="Enter your email" class="newsletter__input">
                        <button class="button">
                            Subscribe
                        </button>
                    </form>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                        <a href="#" class="footer__logo">
                            <img src="images/logomust.png" alt="" class="footer__logo-img">
                            MUST Scholars
                        </a>

                        <p class="footer__description">Enjoy the Easiness & Simplicity <br> of your work.</p>
                        
                        <div class="footer__social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-instagram-alt' ></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-twitter' ></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">About</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Features</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">News</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Our Services</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Pricing</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Discounts</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Our Company</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Blog</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">About us</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Our mision</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="footer__copy">&#169; MUST | All Rights Reserved | Powered By: NTC Mirpur University of Science and Technology (MUST), Mirpur AJK</span>
<!-- 
                <img src="assets/img/footer1-img.png" alt="" class="footer__img-one">
                <img src="assets/img/footer2-img.png" alt="" class="footer__img-two"> -->
            </footer>
    </body>
</html>