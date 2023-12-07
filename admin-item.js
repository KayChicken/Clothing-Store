const title = document.querySelector('#title');
const description = document.querySelector('#description');
const img = document.querySelector("#img");
const brand = document.querySelector("#brand");
const compound = document.querySelector("#compound");
const sizes = document.querySelectorAll(".sizes-checkbox")
const price = document.querySelector("#price");

const form = document.querySelector('.admin-item-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    let formValid = true
    checkRequired([title, description, img, brand, compound, price]) ? formValid : formValid = false

    if (formValid) {
        const size = checkSizes(sizes);
        const response = await fetch("./admin-items-create-api.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",

            },
            body: JSON.stringify({
                "title": title.value,
                "description" : description.value,
                'img' : img.value,
                'brand' : brand.value,
                'compound' : compound.value,
                'price' : price.value,
                'sizes' : size


            }),
        })
        const data = await response.json();
        if (data.type === 'succesful') {
            alert(data.message)
           
        }
        else {
            alert(data.message)
        }
    }




})



const checkRequired = (inputs) => {
    let valid = true
    inputs.forEach((input) => {
        if (input.value.length <= 0) {
            showError(input)
            valid = false
        }
        else {
            showValid(input)
        }
    })
    if (!valid) {return false}
    return true
}


const checkSizes = (sizesInput) => {
    let sizes = []
    sizesInput.forEach((size) => {
        if (size.checked) {
            sizes.push(size.value)
        }
    })
    return sizes
}


const showError = (input, message = 'Обязательное поле') => {
    const parent = input.parentElement;
    parent.className = 'input-block error';
    const error = parent.querySelector('.input-error');
    error.innerHTML = message;

}

const showValid = (input) => {
    const parent = input.parentElement;
    parent.className = 'input-block valid';
}



