export default class NavItem extends HTMLElement {

    #url = ''
    #texto = ''

    /** @type {HTMLLIElement} */
    #item = null;

    /** @type {HTMLLinkElement} */
    #link = null;

    constructor() {
        super()
        this.attachShadow({ mode: 'open' })
    }


    set texto(texto = '') {
        this.#texto = texto
    }

    get texto() {
        return this.#texto
    }

    set url(url = '') {
        this.#url = url
    }

    get url() {
        return this.#url
    }

    connectedCallback() {
        this.render()
    }

    render() {
        this.#item = document.createElement('li')
        this.#item.classList.add('nav-item')

        this.#link = document.createElement('a')
        this.#link.classList.add('nav-link')
        this.#link.href = this.#url
        this.#link.innerText = this.#texto
        this.#link.setAttribute('about', '_blank')

        this.#item.append(this.#link)

        /** @type {HTMLLinkElement}  */
        const style = document.createElement('link')
        style.href = './assets/styles/nav-item.css'
        style.rel  = 'stylesheet'

        this.shadowRoot.append(style, this.#item)
    }

    
}

customElements.define('nav-item', NavItem)