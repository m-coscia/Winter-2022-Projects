//adjusting price on product page depending on number of products
const quantitybutton = document.querySelector(".quantity");
var price = Number(document.querySelector(".price").innerHTML.substring(1));
var quantity = Number(document.querySelector(".quantity").value);
    if(Number.isNaN(quantity) || quantity <= 1){
        quantity = 1;
        document.querySelector(".quantity").textContent = quantity;
    }   
    var mult = Number(quantity*price);
    document.querySelector(".price").textContent = "$"+mult.toFixed(2);
//price adjustment when using arrows
quantitybutton.addEventListener('click', (e)=>{
    var quantity = Number(document.querySelector(".quantity").value);
    if(Number.isNaN(quantity) || quantity <= 1){
    
        document.querySelector(".quantity").textContent = quantity;
    }   
    var mult = Number(quantity*price);
    document.querySelector(".price").textContent = "$"+mult.toFixed(2);
})
//price adjustment when entering a number manually
quantitybutton.addEventListener('keyup', (e)=>{
    var quantity = Number(document.querySelector(".quantity").value);
    if(Number.isNaN(quantity) || quantity <= 1){
       
        quantity = 1;
        document.querySelector(".quantity").textContent = quantity;
    }   
    var mult = Number(quantity*price);
    document.querySelector(".price").textContent = "$"+mult;
})