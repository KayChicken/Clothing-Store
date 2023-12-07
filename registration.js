const username = document.querySelector("#username")
const login = document.querySelector("#login")
const password = document.querySelector("#password")
const repassword = document.querySelector("#repassword")



const form = document.querySelector('.form-registration').addEventListener('submit', async (e) => {
    let formValid = true;
    e.preventDefault()
    checkRequired([username,login,password,repassword]) ? formValid : formValid = false;
    checkLength(password, 2,30) ? formValid : formValid = false
    checkLength(username, 2,30) ? formValid : formValid = false
    checkLength(login, 2,30) ? formValid : formValid = false
    repeatValidPassword() ? formValid : formValid = false
    if (formValid) {
        const response = await fetch("./registration-api.php", {
            method : "POST",
            headers: {
                "Content-Type": "application/json",
             
              },
            body: JSON.stringify({
                "username" : username.value,  
                "login" : login.value,
                "password" : password.value
            }),
        })
        const data = await response.json();
        if (data.type === 'succesful') {
            alert(data.message)
            window.location.href = '/';
        }
        else {
            alert(data.message)
        }
        
    }

    else {
        alert("Витя, давай по-новой")
    }
})


function checkRequired (inputs)  {
    inputs.forEach(input => {
        if (!input.value.length > 0) {
            showError(input,'Обязательное поле')
            return false
        }
        else {
            showValid(input)
        }
    });
    return true
}



function repeatValidPassword  () {
    if (password.value === repassword.value) {
        return true
    }
    else {
        showError(repassword, 'Пароли не совпадают')
    }
}

function checkLength (input,min,max) {

    if (input.value.length <= min) {
        showError(input,`Поле должно быть больше ${min} символов`)
        return false
    }

    if (input.value.length > max) {
        showError(input,`Поле должно быть меньше ${max} символов`)
        return false
    }

    return true
}


function showError (input, text) {
    const parent = input.parentElement;
    parent.className = ("input-block error");
    const error = parent.querySelector('.error-message')
    error.innerHTML = text
    
}


function showValid (input) {
    const parent = input.parentElement;
    parent.className = ("input-block valid");
}


