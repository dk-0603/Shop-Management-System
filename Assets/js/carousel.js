
let scrollContainer=document.querySelector(".content");
let backBtn = document.getElementById("backBtn");
let nextBtn = document.getElementById("nextBtn");

scrollContainer.addEventListener("wheel",(event) =>{
    event.preventDefault();
    scrollContainer.scrollLeft +=event.deltaY;
    scrollContainer.style.scrollBehavior="auto";
});

let card=document.querySelector(".card");
let madhesia= card.offsetWidth;
 

backBtn.addEventListener("click",() =>{
    scrollContainer.style.scrollBehavior="smooth";
    scrollContainer.scrollLeft -= (madhesia+10);
});


nextBtn.addEventListener("click",()=>{
    scrollContainer.style.scrollBehavior="smooth";
    scrollContainer.scrollLeft += (madhesia+10);
});
 