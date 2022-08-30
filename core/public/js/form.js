document.addEventListener('DOMContentLoaded', () => {
    let i = 0;
    document.getElementById('add-more').addEventListener('click', function () {
        i++

        const form = document.getElementById('ram-modules')
        const array = [
            {name: 'size', type: 'number'},
            {name: 'type', type: 'text'},
            {name: 'amount', type: 'number'}
        ]

        for (let element of array) {
            const div = document.createElement('div')
            const input = document.createElement('input')
            input.setAttribute('type', element.type)
            input.setAttribute('value', '')
            input.setAttribute('name', `ram_modules[${i}][${element.name}]`)
            input   .setAttribute('placeholder', element.name)
            div.appendChild(input)
            form.appendChild(div)
        }
    })
})
