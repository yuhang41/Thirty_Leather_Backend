//development-process-swiper
let development_steps=['層皮','腳跟','楦頭','內裏']
//右邊文字的swiper
var swiper3 = new Swiper(".mySwiper3", {
  slidesPerView: '1',
  spaceBetween: 30, 
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  centeredSlides: false,   
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
 spaceBetween: 30,
 watchSlidesVisibility: true,
  watchSlidesProgress: true, 
 loop: true,
 loopFillGroupWithBlank: true,
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
 breakpoints: {
  // when window width is >= 1350px
  // 1250:{
  //   slidesPerView: 'auto',
  // },
  700:{
    slidesPerView: 'auto',
  },
  300: {
    slidesPerView: 1,
  },      
}
});