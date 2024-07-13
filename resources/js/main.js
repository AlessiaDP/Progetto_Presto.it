// alert col timer
document.addEventListener("DOMContentLoaded", function () {
    let successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 3000);
    }
});

import { Dropdown, Collapse, Ripple, initMDB, Input } from "mdb-ui-kit";

initMDB({ Dropdown, Collapse, Ripple, Input });


// ! favorite button
document.addEventListener('DOMContentLoaded', function () {
    if (window.location.hash) {
        const element = document.querySelector(window.location.hash);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    }
});


// todo swiper
let swiper = new Swiper(".mySwiper", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 66.6,
        shadowScale: 0.666,
    },
    // pagination: {
    //     el: ".swiper-pagination",
    // },
});

let personInfoWrapper = document.querySelector("#person-info-wrapper");
let div = document.createElement("div");
div.classList.add("col-12");

swiper.on("slideChange", function () {
    personInfoWrapper.innerHTML = '';

    if (swiper.activeIndex == 1) {
        div.innerHTML = `
                    <div class="card shadow p-5 text-center">
                        <h4 class="text-center pb-2">Vincenzo Buonanova</h4>
                        <p>Anno di nascita: 1995</p>
                        <p>Posizione: Matera</p>
                        <p>Ruolo: Full Stack Developer</p>
                        <p>Amante del planning e dell'organizzazione, giocatore di scacchi e master di Dungeons&Dragons. Sempre affamato di sfide.</p>
                        <div class="row justify-content-evenly w-100 text-center">
                            <p>Contatti:</p>
                            <div class="col-4">
                                <i class="fa-solid fa-phone text-center"></i><br><p class="text-or">+39 371 149 0783</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-envelope text-center"></i><br><p class="text-or">vbuonanova@gmail.com</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-brands fa-linkedin text-center"></i><br><a href="https://www.linkedin.com/in/vincenzobuonanovadeveloper/">https://www.linkedin.com/in/vincenzobuonanovadeveloper/</a>
                            </div>
                        </div>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    } else if (swiper.activeIndex == 2) {
        div.innerHTML = `
                    <div class="card shadow p-5 text-center">
                        <h4 class="text-center pb-2">Alessia Del Prete</h4>
                        <p>Anno di nascita: 1997</p>
                        <p>Posizione: Torino</p>
                        <p>Ruolo: Full Stack Developer</p>
                        <p>Appassionata di viaggi, mi piace interfacciarmi con culture nuove e diverse. Mi piace cucinare, leggere, ballare.</p>
                        <div class="row justify-content-evenly w-100 text-center">
                            <p>Contatti:</p>
                            <div class="col-4">
                                <i class="fa-solid fa-phone text-center"></i><br><p class="text-or">+39 345 620 8950</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-envelope text-center"></i><br><p class="text-or">alessia.delprete97@gmail.com</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-brands fa-linkedin text-center"></i><br><a href="https://www.linkedin.com/in/alessiadelprete-developer/">https://www.linkedin.com/in/alessiadelprete-developer/</a>
                            </div>
                        </div>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    } else if (swiper.activeIndex == 3) {
        div.innerHTML = `
                    <div class="card shadow p-5 text-center">
                        <h4 class="text-center pb-2">Benedetto Filipponio</h4>
                        <p>Anno di nascita: 1998</p>
                        <p>Posizione: Bari</p>
                        <p>Ruolo: Front End Developer</p>
                        <p>Nel tempo libero amo dedicarmi allo sport e alla musica.</p>
                        <div class="row justify-content-evenly w-100 text-center">
                            <p>Contatti:</p>
                            <div class="col-4">
                                <i class="fa-solid fa-phone text-center"></i><br><p class="text-or">+39 366 346 3550</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-envelope text-center"></i><br><p class="text-or">b.filipponio@gmail.com</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-brands fa-linkedin text-center"></i><br><a href="https://www.linkedin.com/in/benedetto-filipponio/">https://www.linkedin.com/in/benedetto-filipponio/</a>
                            </div>
                        </div>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    } else if (swiper.activeIndex == 4) {
        div.innerHTML = `
                    <div class="card shadow p-5 text-center">
                        <h4 class="text-center pb-2">Fabio Ortu</h4>
                        <p>Anno di nascita: 2000</p>
                        <p>Posizione: Sassari</p>
                        <p>Ruolo: Front End Developer</p>
                        <p>Sono un appassionato di tecnologia e di cucina, come hobby mi piace cucinare qualsiasi tipo di pietanza.</p>
                        <div class="row justify-content-evenly w-100 text-center">
                            <p>Contatti:</p>
                            <div class="col-4">
                                <i class="fa-solid fa-phone text-center"></i><br><p class="text-or">+39 351 929 8615</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-envelope text-center"></i><br><p class="text-or">fabioortu00.fo@gmail.com</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-brands fa-linkedin text-center"></i><br><a href="https://www.linkedin.com/in/fabio-ortu-8594a7304/">https://www.linkedin.com/in/fabio-ortu-8594a7304/</a>
                            </div>
                        </div>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    } else if (swiper.activeIndex == 5) {
        div.innerHTML = `
                    <div class="card shadow p-5 text-center">
                        <h4 class="text-center pb-2">Filippo Sorze</h4>
                        <p>Anno di nascita: 2001</p>
                        <p>Posizione: Como</p>
                        <p>Ruolo: Front End Developer</p>
                        <p>Come hobby mi dedico alla lettura e cinematografia, sono curioso ed intraprendente.</p>
                        <div class="row justify-content-evenly w-100 text-center">
                            <p>Contatti:</p>
                            <div class="col-4">
                                <i class="fa-solid fa-phone text-center"></i><br><p class="text-or">+39 389 619 0064</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-solid fa-envelope text-center"></i><br><p class="text-or">filipposorze@hotmail.it</p>
                            </div>
                            <div class="col-4">
                                <i class="fa-brands fa-linkedin text-center"></i><br><a href="https://www.linkedin.com/in/filippo-sorze-72b136278/">https://www.linkedin.com/in/filippo-sorze-72b136278/</a>
                            </div>
                        </div>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    } else {
        div.innerHTML = `
                    <div class="card p-5">
                        <h1 class="text-center fst-italic">Vieni a conoscere il nostro fantastico team</h1>
                    </div>
                `;
        personInfoWrapper.appendChild(div);
    }
});