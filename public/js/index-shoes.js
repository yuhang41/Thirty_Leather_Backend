//development-process-swiper
let development_steps=['層皮','腳跟','樁頭','結語']
//右邊文字的swiper
var swiper3 = new Swiper(".mySwiper3", {
  slidesPerView: 'auto',
  spaceBetween: 30, 
  watchSlidesVisibility: true,
   watchSlidesProgress: true,   
  navigation: {
    nextEl: ".button-next",      
  },
  pagination: {
    el: ".pagination-next",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + '<p>' +development_steps[index]+ '</p>'+ "</span>";
    },
  },
  thumbs: {
   swiper: swiper4,
 },  
});
//左邊圖片的swiper
var swiper4 = new Swiper(".mySwiper4", {
 slidesPerView: 'auto',
 spaceBetween: 100,
 navigation: {
   nextEl: ".button-next",      
 },
 pagination: {
   el: ".pagination-next",
   clickable: true,
   renderBullet: function (index, className) {
     return '<span class="' + className + '">' + '<p>' +development_steps[index]+ '</p>'+ "</span>";
   },
 },
 thumbs: {
   swiper: swiper3,
 },
});