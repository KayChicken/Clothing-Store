
function addCart(id) {
    const items = getCookie('items')
    console.log(typeof items)
    document.cookie = "items=" + JSON.stringify(items);

}



function clearCart() {
    document.cookie = "items=" + JSON.stringify([]);

}



function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function setCookie(name, value) {
    document.cookie = name + "=" + value + "; path=/";
}