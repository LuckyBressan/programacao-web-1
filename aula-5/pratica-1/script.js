document.addEventListener('readystatechange', () => {
    /** @type {HTMLInputElement} */
    const num1 = document.querySelector('#num1')
    /** @type {HTMLInputElement} */
    const num2 = document.querySelector('#num2')
    /** @type {HTMLSelectElement} */
    const selectOperacao = document.querySelector('#operation')

    /** @type {HTMLButtonElement} */
    const botao = document.querySelector('#calcular')

    /** @type {HTMLDivElement} */
    const result = document.querySelector('#result')

    
    botao.addEventListener('click', (e) => {
        e.preventDefault()
        e.stopPropagation()

        let val1 = num1.value
        let val2 = num2.value
        const operacao = selectOperacao.value

        if(
            val1 == 0 &&
            val2 == 0 &&
            operacao == '/'
        ) {
            alert('Não é possível dividir 0 por 0')
            return
        }

        if( operacao == '-' && val2 < 0 ) {
            val2 = `(${val2})`;
        }
        const resultado = eval(`${val1}${operacao}${val2}`)

        if (resultado > 0) {
            result.style.backgroundColor = 'rgba(0, 128, 0, .15)'
        } else if(resultado < 0) {
            result.style.backgroundColor = 'rgba(255, 0, 0, .15)'
        } else {
            result.style.backgroundColor = 'rgba(128, 128, 128, .15)'
        }

        result.innerText = resultado
    })
})