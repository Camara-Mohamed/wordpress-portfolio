export const settings = {
    lampe: {
        lampeSelector: ".lampe",
        lampeImageSelector: ".lampe__image",
        turnOffSelector: ".lampe__button--off",
        turnOnSelector: ".lampe__button--on",
        hiddenSelector: "sro",
        lampeOn: "/wp-content/themes/portfolio/resources/svg/lampe-on.svg",
        lampeOff: "/wp-content/themes/portfolio/resources/svg/lampe-off.svg",
        lampeOffClass: "lampe__off",
        lampeOnClass: "lampe__on"
    },
    
    scroll: {
        scrollSelector: ".scroll__content--change",
    }
}
const scrollApp = {

    scrollContentSelector: document.querySelector(settings.scroll.scrollSelector),

    init() {
        window.addEventListener("scroll", () => {
            const bodyHeight = document.body.clientHeight;
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;

            const scrollCalcul = (scrollY / (bodyHeight - windowHeight)) * 100;

            this.scrollContentSelector.textContent = `${scrollCalcul.toFixed(0)}%`;
        });
    }
}

scrollApp.init();
const lampeApp = {
    lampeContainerElement: document.querySelector(settings.lampe.lampeSelector),
    lampeElement: document.querySelector(settings.lampe.lampeImageSelector),
    lampeTurnOffElement: document.querySelector(settings.lampe.turnOffSelector),
    lampeTurnOnElement: document.querySelector(settings.lampe.turnOnSelector),
    rootElement: document.documentElement,

    init() {
        this.lampeContainerElement.addEventListener('click', () => {
            if (this.lampeElement.classList.contains('lampe__off')) {
                this.lampeTurnOn();
            } else {
                this.lampeTurnOff();
            }
        });
    },

    lampeTurnOn() {
        this.lampeTurnOffElement.classList.remove(settings.lampe.hiddenSelector);
        this.lampeTurnOnElement.classList.add(settings.lampe.hiddenSelector);
        this.lampeElement.src = settings.lampe.lampeOn;
        this.lampeElement.classList.remove(settings.lampe.lampeOffClass);
        this.lampeElement.classList.add(settings.lampe.lampeOnClass);

        // Couleur de base
        this.rootElement.style.setProperty('--c-beige-light', '#F8F3E0');
        this.rootElement.style.setProperty('--c-beige-mid', '#F5E8C9');
        this.rootElement.style.setProperty('--c-beige-dark', '#E0D3B4');
        this.rootElement.style.setProperty('--c-brown', '#2A2118');
    },

    lampeTurnOff() {
        this.lampeTurnOffElement.classList.add(settings.lampe.hiddenSelector);
        this.lampeTurnOnElement.classList.remove(settings.lampe.hiddenSelector);
        this.lampeElement.src = settings.lampe.lampeOff;
        this.lampeElement.classList.add(settings.lampe.lampeOffClass);
        this.lampeElement.classList.remove(settings.lampe.lampeOnClass);

        // Couleurs un peu plus sombres
        this.rootElement.style.setProperty('--c-beige-light', '#E8E0C9');
        this.rootElement.style.setProperty('--c-beige-mid', '#DCCBAA');
        this.rootElement.style.setProperty('--c-beige-dark', '#C4B99C');
        this.rootElement.style.setProperty('--c-brown', '#1E1812');
    },
}

lampeApp.init();

function fancybox() {
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind('[data-fancybox="gallery"]', {});
    });
}
fancybox();
