let itemsId = [];
const num = document.querySelector("#num-items")
const items = document.querySelectorAll('.change-product-card').forEach((item) => {
    item.addEventListener('click', (e) => {
        item.classList.toggle('choosen');
        if (itemsId.includes(item.dataset.id)) {
            itemsId = itemsId.filter((id) => id !== item.dataset.id);
        } else {
            itemsId.push(item.dataset.id);
        }
        num.innerHTML = `Choose items : ${itemsId.length}`
    });
});
const deleteBtn = document.querySelector("#delete-btn").addEventListener("click", async  () => {
    if (itemsId.length <= 0) {
        alert("Предметы не выбраны!")
    }

    else {
        const response = await fetch("./admin-items-delete-api.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",

            },
            body: JSON.stringify({
                "items": itemsId,
                


            }),
        })
        const data = await response.json();
        if (data.type === 'succesful') {
            alert(data.message)
            window.location.href = window.location.pathname;
           

        }
        else {
            alert(data.message)
        }
    }
})


