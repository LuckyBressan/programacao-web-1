document.addEventListener('DOMContentLoaded', () => {
    const buttonMediaNotas = document.querySelector('#media-notas')
    const buttonMediaNotasAluno = document.querySelector('#media-notas-aluno')

    /** @type {HTMLTableElement} */
    const table = document.querySelector('#table-notas')

    buttonMediaNotas.addEventListener('click', () => {
        const tbody = table.querySelector('tbody')

        let trMedia = tbody.querySelector('.linha-media-notas')
        if(!trMedia) {
            trMedia  = document.createElement('tr')
            trMedia.classList.add('linha-media-notas')
            tbody.append(trMedia)
        }

        trMedia.innerHTML = ''

        let mediaNotas = 0;

        const tdMediaTitulo = document.createElement('td')
        tdMediaTitulo.innerText = 'Média'
        trMedia.appendChild(tdMediaTitulo)

        for(let i = 1; i < 10; i++ ) {
            const allTds = tbody.querySelectorAll(`.nota-${i}`)
            allTds.forEach(td => {
                mediaNotas += parseFloat(td.innerHTML)
            })
            const tdMedia = document.createElement('td')
            tdMedia.innerHTML = (mediaNotas / allTds.length).toFixed(2)
            trMedia.append(tdMedia)
            mediaNotas = 0;
        }
    })

    buttonMediaNotasAluno.addEventListener('click', () => {
        const tbody = table.querySelector('tbody')

        let thead = table.querySelector('thead')

        let thMediaTitulo = thead.querySelector('.coluna-media-nota')
        if(!thMediaTitulo) {
            thMediaTitulo = document.createElement('th')
            thMediaTitulo.classList.add('coluna-media-nota')
            thMediaTitulo.innerText = 'Média'
            thMediaTitulo.rowSpan   = 2
            thead.querySelector('tr').appendChild(thMediaTitulo)
        }

        tbody.querySelectorAll('.media-nota-aluno').forEach(td => td.remove())

        let   mediaNotas = 0;

        tbody.querySelectorAll('tr:not(.linha-media-notas)').forEach(tr => {
            const tdMedia  = document.createElement('td')
            tdMedia.classList.add('media-nota-aluno')
            const allTd    = tr.querySelectorAll('td:not(:first-of-type)')
            allTd.forEach(td => {
                mediaNotas += parseFloat(td.innerHTML)
            })
            tdMedia.innerText = (mediaNotas / allTd.length).toFixed(2)
            tr.append(tdMedia)
            mediaNotas = 0
        })
    })
})