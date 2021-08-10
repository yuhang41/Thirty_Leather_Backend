

//When the user scrolls the page, execute myFunction
window.onscroll = function(){myFunction()};
//取得螢幕的高度
var  screenHeight = screen.height;

let backTopBtn = document.querySelector('.back-top');
let commodityOpt = document.querySelector('.all-commodity');
function myFunction() {
  if(window.pageYOffset >= screenHeight/2){
    commodityOpt.classList.add("sticky");
  }else{
    commodityOpt.classList.remove("sticky");
  }
  if (window.pageYOffset >= screenHeight) {
    backTopBtn.classList.add("sticky");
  } else {
    backTopBtn.classList.remove("sticky");
  }
}

//回到上層按鈕
let anchor = document.querySelector('.a-anchor');
console.log(anchor);
anchor.addEventListener('click',function(){
  window.scrollTo(0, top);
})
