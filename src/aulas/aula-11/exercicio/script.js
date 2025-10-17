document.addEventListener('DOMContentLoaded', () => {

    /** @type {HTMLSelectElement} */
    const operacao = document.querySelector('#operacao')

    operacao.addEventListener('change', (event) => {
        /** @type {NodeListOf<HTMLFieldSetElement>} */
        const fieldsets = document.querySelectorAll('.fieldset-infos');
        if( event )
        fieldsets.forEach(fieldset => {
            fieldset.style.display = 'none';
            fieldset.querySelectorAll('input, select').forEach(element => {
                element.removeAttribute('required')
            })
        })
    })
})