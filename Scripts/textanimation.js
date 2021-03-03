const text = document.querySelector('.social');
const strText = text.textContent;
const splitText = strText.split("");
text.textContent = "";

console.log(splitText);

for (let i = 0; i < splitText.length; i++) {
    text.innerHTML += "<span>" + splitText[i] + "</span>";  
}

let char = 0;
let timer = setInterval(ontTick, 250);

function ontTick(){
    const span = text.querySelectorAll('span')[char];
    span.classList.add('fade');
    char++;
    if(char === splitText.length){
        complete();
        return;
    }
}

function complete(){
    clearInterval(timer);
    timer = null;
}




