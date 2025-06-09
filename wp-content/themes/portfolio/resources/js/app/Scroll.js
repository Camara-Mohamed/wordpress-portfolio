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