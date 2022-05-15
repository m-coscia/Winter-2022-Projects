const morebtn = document.querySelector(".more-desc");
const preview = document.querySelector(".preview-text");

morebtn.addEventListener('click', (e)=>{
    preview.classList.toggle('show-more');
    if(morebtn.innerHTML == '...More Description'){
        morebtn.innerHTML = 'Less Description';
    }
    else{
        morebtn.innerHTML = '...More Description';
    }
})