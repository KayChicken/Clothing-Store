const removeItem = document.querySelectorAll(".remove-item").forEach((btn) => {
    btn.addEventListener("click", async () => {

        const id = btn.dataset.id;
        const size = btn.dataset.size;
       
        
        const response = await fetch("./cart-item-remove.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",

            },
            body: JSON.stringify({
                "id_item": id,
                "size" : size
            })
        })

        const answer = await response.json()
        if (answer.type === 'succesful') {
            alert(answer.message)
            window.location.href = window.location.pathname;
        }
        else {
            alert(answer.message)
        }
    })
})