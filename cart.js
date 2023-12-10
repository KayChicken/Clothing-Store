const sizeInputs = document.querySelectorAll('.item__sizes');
const id_item = document.querySelector("#id_item");


const form = document.querySelector('.item-form').addEventListener('submit', async (e) => {
    e.preventDefault()
    if (!id_item) {
        return alert("Произошла ошибка")
    }

    let size = ''
    sizeInputs.forEach((sizeInput) => {
        if (sizeInput.checked) {
            size = sizeInput.dataset.id;
        }
    })

    const response = await fetch("./cart-item-api.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",

        },
        body: JSON.stringify({
            "id_item": id_item.value,
            "size": size
        })
    })

    const answer = await response.json()
    if (answer.type === 'succesful') {
        alert(answer.message)
    }
    else {
        alert(answer.message)
    }


})


