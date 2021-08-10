$(document).ready(function() {
    $(".stick-container").click(function() {
      $(".stick").toggleClass(function () {
        return $(this).is('.open, .close') ? 'open close' : 'open';
      });
    });
  });
//navbar
//When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};
// Get the navbar
var navbar = document.getElementById("navbar");
console.log(navbar);
// Get the offset position of the navbar
var sticky = navbar.offsetTop;
//取得banner的高度
var bannerHeight = document.querySelector('.swiper-container').offsetHeight;
// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
let shortLine = document.querySelector('.short-line');
let longLine = document.querySelector('.long-line');
let backTopBtn = document.querySelector('.back-top');
function myFunction() {
  if (window.pageYOffset >= bannerHeight) {
    navbar.classList.add("sticky");
    // longLine.className="long-line";
    // shortLine.className="short-line";
    backTopBtn.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
    // longLine.className="";
    // shortLine.className="";
    backTopBtn.classList.remove("sticky");
  }
}
