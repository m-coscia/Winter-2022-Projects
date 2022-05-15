let itemName = document.getElementById("savingChoices").getAttribute( "data-url" );
if (localStorage.getItem(itemName)==null){
    localStorage.setItem(itemName, 1);
}
let inputElem = document.querySelector('input');
inputElem.addEventListener('input', () => {
    localStorage.setItem(itemName, inputElem.value);
});
document.getElementById(itemName).value = localStorage.getItem(itemName);
