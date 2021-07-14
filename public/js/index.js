AOS.init({
  duration: 1200,
})

//聯絡客服的顯示
document.querySelector('.more-button').addEventListener('click', function () {
    document.querySelector('.chatbot').classList.toggle('active');
});


//Pagination Swiper
var myswiper1 = new Swiper('.myswiper1', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination1',
        clickable: true,
    },
});

// Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

//Plus-Shopping
// let PlusButtons = document.querySelectorAll('.plus-shopping');

// function PlusButtonHandler(){
//     let formData = new FormData();
//     let productId = this.dataset.id;
//     let csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//     formData.append('_token',csrf_token);
//     formData.append('productId',productId);
//     fetch('/front/product/add',{
//         'method' : 'POSt',
//         'body' : formData
//     }).then(rep=>{
//         return rep.text();
//     }).then(result=>{
//         if(result == 'success'){
//             console.log(result);
//             alert('已加入購物車');
//         }
//     });
// }
// PlusButtons.forEach(PlusButton => PlusButton.addEventListener('click',PlusButtonHandler));
