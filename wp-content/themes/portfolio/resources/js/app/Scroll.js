const scrollApp = {

    scrollContentElement: document.querySelector(settings.scroll.scrollSelector),
    scrollContainerElement: document.getElementById(settings.scroll.scrollContainerSelector),

    init() {
        window.addEventListener("scroll", () => {
            const bodyHeight = document.body.clientHeight;
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;

            const scrollCalcul = (scrollY / (bodyHeight - windowHeight)) * 100;

            this.scrollContentElement.textContent = `${scrollCalcul.toFixed(0)}%`;

            if (scrollCalcul >= 100) {
                this.scrollContainerElement.classList.add(settings.scroll.hiddenSelector);
            } else {
                this.scrollContainerElement.classList.remove(settings.scroll.hiddenSelector);
            }
        });
    }
}

scrollApp.init();