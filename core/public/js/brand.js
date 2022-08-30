document.addEventListener('DOMContentLoaded', () => {
    addBrandOptions()
})

const getBrands = async () => {
    const response = await fetch(`${APP_URL}/brands`)

    return response.json()
}

const addBrandOptions = async () => {
    const brandSelector = document.getElementById("brand-selector")
    const brands = await getBrands()

    for (brand of brands) {
        const option = document.createElement("option")
        option.value = brand.id
        option.text = brand.name
        brandSelector.appendChild(option)
    }
}
