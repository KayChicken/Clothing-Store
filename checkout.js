const fullName = document.querySelector("#fullName");
const city = document.querySelector('#city');
const address = document.querySelector('#address');
const phoneNumber = document.querySelector("#phoneNumber");


const form = document.querySelector('.dilivery-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    let formValid = true
    checkRequired([fullName, city, address, phoneNumber]) ? formValid : formValid = false

    if (formValid) {
        const response = await fetch("./checkout-api.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",

            },
            body: JSON.stringify({
                "fullName" : fullName.value,
                "city" : city.value,
                "address" : address.value,
                "phoneNumber" : phoneNumber.value


            }),
        })
        const data = await response.json();
        console.log(data)
        if (data.type === 'succesful') {
            alert(data.message)
            window.location = '/';
           
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



