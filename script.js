const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');
const userContainer = document.querySelector('.user-info');


if(bar){
    bar.addEventListener('click', ()=>{
        nav.classList.add('active');
    })
}
if(close){
    close.addEventListener('click', ()=>{
        nav.classList.remove('active');
    })
}

 
 const scrollToProductButton = document.getElementById('shopNow');

 const product1Section = document.getElementById('product1');

 scrollToProductButton.addEventListener('click', () => {
    
     product1Section.scrollIntoView({ behavior: 'smooth' });
 });



document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');

    menuToggle.addEventListener('click', function() {
        menuToggle.classList.toggle('active');
    });
});



//Show or hide user info based on login status
if (userContainer) {
    if (isLoggedIn) {
        userContainer.style.display = 'block';
    } else {
        userContainer.style.display = 'none';
    }
}



