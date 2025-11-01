const lampeApp = {
    lampeContainerElement: document.querySelector(settings.lampe.lampeSelector),
    lampeElement: document.querySelector(settings.lampe.lampeImageSelector),
    lampeTurnOffElement: document.querySelector(settings.lampe.turnOffSelector),
    lampeTurnOnElement: document.querySelector(settings.lampe.turnOnSelector),
    rootElement: document.documentElement,

    init() {
        this.getLampeState();

        this.lampeContainerElement.addEventListener('click', () => {
            if (this.lampeElement.classList.contains('lampe__off')) {
                this.lampeTurnOn();
            } else {
                this.lampeTurnOff();
            }
        });
    },

    getLampeState() {
        const lampeState = localStorage.getItem('lampe-state');

        if (lampeState === 'on') {
            this.lampeTurnOn();
        } else if (lampeState === 'off') {
            this.lampeTurnOff();
        }
    },

    lampeTurnOn() {
        localStorage.setItem('lampe-state', 'on');
        this.lampeTurnOffElement.classList.remove(settings.lampe.hiddenSelector);
        this.lampeTurnOnElement.classList.add(settings.lampe.hiddenSelector);
        this.lampeElement.src = settings.lampe.lampeOn;
        this.lampeElement.classList.remove(settings.lampe.lampeOffClass);
        this.lampeElement.classList.add(settings.lampe.lampeOnClass);

        this.rootElement.style.setProperty('--c-beige-light', '#F8F3E0');
        this.rootElement.style.setProperty('--c-beige-mid', '#F5E8C9');
        this.rootElement.style.setProperty('--c-beige-dark', '#E0D3B4');
    },

    lampeTurnOff() {
        localStorage.setItem('lampe-state', 'off');
        this.lampeTurnOffElement.classList.add(settings.lampe.hiddenSelector);
        this.lampeTurnOnElement.classList.remove(settings.lampe.hiddenSelector);
        this.lampeElement.src = settings.lampe.lampeOff;
        this.lampeElement.classList.add(settings.lampe.lampeOffClass);
        this.lampeElement.classList.remove(settings.lampe.lampeOnClass);

        this.rootElement.style.setProperty('--c-beige-light', '#F2ECE0');
        this.rootElement.style.setProperty('--c-beige-mid', '#E8DFC2');
        this.rootElement.style.setProperty('--c-beige-dark', '#D9C6A7');
    },
}

lampeApp.init();