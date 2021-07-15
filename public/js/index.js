AOS.init({
  duration: 1200,
})

//聯絡客服的顯示開關
let closeBtn = document.querySelector('.close');
document.querySelector('.more-button').addEventListener('click', function () {
    document.querySelector('.chatbot').classList.toggle('active');
});
closeBtn.addEventListener('click', function () {
  document.querySelector('.chatbot').classList.remove('active');
});


//Pagination Swiper
var myswiper1 = new Swiper('.myswiper1', {
  // effect: 'fade',
  autoplay: {
    delay: 3000,
  },
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
    breakpoints: {
      // when window width is >= 1350px
      1550:{
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      1350:{
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
      },
    }
  });


// 滾動顯示
window.onwheel = wheelslide;
// window scroll function
function wheelslide(e)
{
  var moveEffect = document.getElementById('move');

  // scrolling downward
  if(e.deltaY > 0)
  {
    if(moveEffect.style.right == '650px' || moveEffect.style.right == ''){
      moveEffect.style.right = '323px';
      moveEffect.style.opacity = '1';
    }

  }
  else
  {
    if(moveEffect.style.right == '323px'){
      moveEffect.style.right = '650px';
      moveEffect.style.opacity = '0';
    }

  }
}


//navbar
//When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};
// Get the navbar
var navbar = document.getElementById("navbar");
// Get the offset position of the navbar
var sticky = navbar.offsetTop;
//取得banner的高度
var bannerHeight = document.querySelector('.swiper-container').offsetHeight;
// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
let shortLine = document.querySelector('.short-line');
let longLine = document.querySelector('.long-line');
function myFunction() {
  if (window.pageYOffset >= bannerHeight) {
    navbar.classList.add("sticky");
    longLine.className="long-line";
    shortLine.className="short-line";
  } else {
    navbar.classList.remove("sticky");
    longLine.className="";
    shortLine.className="";
  }
}
//slide in on scroll
// window.onscroll = function() {myFunction()};
// let shortLine = document.querySelector('.short-line');
// let longLine = document.querySelector('.long-line');


// window.onscroll = function() {myFunction()};

// function myFunction() {
//   if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
//     longLine.className="long-line";
//     shortLine.className="short-line";
//   } else {
//     longLine.className="";
//     shortLine.className="";
//   }
// }

//試穿資訊按鈕操控
let photo_Button = document.querySelector('.photo-button');
let closes = document.querySelector('.studio-photo-close');
let studio_Photo = document.querySelector('.studio-photo');

closes.addEventListener('click',function(){
  studio_Photo.classList.remove('active');

},false);
photo_Button.addEventListener('click',function(){
  studio_Photo.classList.add('active');
});


const inViewport = (entries, observer) => {
  entries.forEach(entry => {
      entry.target.classList.toggle("is-inViewport", entry.isIntersecting);
  });
};

const Obs = new IntersectionObserver(inViewport);
const obsOptions = {};
// Attach observer to every [data-inviewport] element:
const ELs_inViewport = document.querySelectorAll('[data-inviewport]');
ELs_inViewport.forEach(EL => {
  Obs.observe(EL, obsOptions);
});
