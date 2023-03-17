
const allFilterItems = document.querySelectorAll('.filter-item');
const allFilterBtns = document.querySelectorAll('.filter-btn');

window.addEventListener('DOMContentLoaded', () => {
    allFilterBtns[0].classList.add('active-btn');
});

allFilterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        showFilteredContent(btn);
    });
});

function showFilteredContent(btn){
    allFilterItems.forEach((item) => {
        if(item.classList.contains(btn.id)){
            resetActiveBtn();
            btn.classList.add('active-btn');
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
}

function resetActiveBtn(){
    allFilterBtns.forEach((btn) => {
        btn.classList.remove('active-btn');
    });
}













/*
const allFilterItems = document.querySelectorAll('.filter-item');
const allFilterBtns = document.querySelectorAllSelector ('.filter-btn');

allFilterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        showFilteredContent(btn);
    });
});

function showFilteredContent(btn){
    allFilterItems.forEach((item)=>{
        if(item.classList.contains(btn.id)){
            item.style.display = "block";
        } else{
            item.style.display = "none";
        }
    });
}


const allFilterItems = document.querySelectorAll('.filter-item')
const allFilterBtns = document.querySelectorAllSelector ('.filter-btn')


allFilterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        showFilteredContent(btn);
    });
}); */
/*
function showFilteredContent(btn){
    allFilterItems.forEach(item => {
        if(item.classList.contains(btn.id)){
            btn.classList.add('active-btn');
            item.style.display = "block";
        } else{
            item.style.display = "none";
        }
    });
}



/**const allFilterItems = document.querySelectorAll('.filter-item')
const allFilterBtns = document.querySelectorAllSelector ('.filter-btn')

allFilterBtns.forEach((btn)=> {
    btn.addEventListener('click', () => {
        showFilteredContent(btn);
    });
});

function showFilteredContent(btn){
    allFilterItems.forEach((item)=>{
        if(item.classList.contains(btn.id)){
            item.style.display = "block";
        } else{
            item.style.display = "none";
        }
    });
} */