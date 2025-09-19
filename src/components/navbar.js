export default class Navbar extends HTMLElement {

    /** @type {HTMLElement} */
    #nav   = null
    /** @type {HTMLUListElement} */
    #lista = null
    /** @type {HTMLLIElement} */
    #links = []


    constructor() {
        super()
        this.attachShadow({ mode: 'open' })
    }

    /**
     * @param {HTMLElement[]} links
     */
    set links(links = []) {
        this.#lista.innerHTML = ''
        this.#lista.append(links)
    }

    

    connectedCallback() {
        this.render()
        this.#renderLinks()
    }

    render() {
        this.#nav = document.createElement('nav')
        this.#nav.classList.add('navbar')

        this.#lista = document.createElement('ul')
        this.#lista.classList.add('nav-lista')

        const item = document.createElement('nav-item')
        item.url = 'teste.php'
        item.texto = 'Teste'
        this.#lista.append(item)

        this.#nav.append(this.#lista)

        /** @type {HTMLLinkElement} */
        const style = document.createElement('link')
        style.href = './assets/styles/navbar.css'
        style.rel  = 'stylesheet'

        this.shadowRoot.append(style, this.#nav)
    }

    #renderLinks() {
        
    }
}

customElements.define('navbar-aulas', Navbar)